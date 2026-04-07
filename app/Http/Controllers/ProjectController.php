<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class ProjectController extends Controller
{
    public function index(): View
    {
        $catalog = $this->getCatalog();

        return view('projects', [
            'categories' => $catalog['categories'],
            'projects' => $catalog['projects'],
        ]);
    }

    public function show(string $category, string $project): View
    {
        $catalog = $this->getCatalog();
        $projects = $catalog['projects'];

        $projectItem = $projects->first(function (array $item) use ($category, $project) {
            return $item['category_slug'] === $category && $item['project_slug'] === $project;
        });

        abort_unless($projectItem, 404);

        return view('project-detail', [
            'project' => $projectItem,
        ]);
    }

    private function getCatalog(): array
    {
        $projectBase = public_path('images/projects');
        $categories = $this->getCategories();
        $projectsByCategory = [];

        foreach ($categories as $category) {
            $folderPath = $projectBase . DIRECTORY_SEPARATOR . $category['folder'];
            $files = File::exists($folderPath) ? File::files($folderPath) : [];

            $projectsByCategory[$category['slug']] = collect($files)
                ->filter(fn (SplFileInfo $file) => in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp'], true))
                ->map(fn (SplFileInfo $file) => $this->mapProjectFile($file, $category))
                ->sortBy('index')
                ->values();
        }

        $firstProjects = collect();
        $remainingProjects = collect();

        foreach ($categories as $category) {
            /** @var \Illuminate\Support\Collection<int, array> $items */
            $items = $projectsByCategory[$category['slug']] ?? collect();

            if ($items->isEmpty()) {
                continue;
            }

            $firstProjects->push($items->first());
            $remainingProjects = $remainingProjects->merge($items->slice(1)->values());
        }

        return [
            'categories' => $categories,
            'projects' => $firstProjects->merge($remainingProjects)->values(),
        ];
    }

    private function getCategories(): Collection
    {
        return collect([
            [
                'label' => 'URBANDESIGN AND TOWNSHIP',
                'folder' => '01. URBANDESIGN AND TOWNSHIP',
                'color' => '#0ea5e9',
            ],
            [
                'label' => 'RESIDENTIAL AND HOUSING',
                'folder' => '02. RESIDENTIAL AND HOUSING',
                'color' => '#f59e0b',
            ],
            [
                'label' => 'INDUSTRIES',
                'folder' => '03. INDUSTRIES',
                'color' => '#10b981',
            ],
            [
                'label' => 'EDUCATION',
                'folder' => '04. EDUCATION',
                'color' => '#a855f7',
            ],
            [
                'label' => 'COMMERCIAL',
                'folder' => '05. COMMERCIAL',
                'color' => '#f97316',
            ],
            [
                'label' => 'HOSPITALITY',
                'folder' => '06. HOSPITALITY',
                'color' => '#ef4444',
            ],
            [
                'label' => 'HEALTHCARE',
                'folder' => '07. HEALTHCARE',
                'color' => '#14b8a6',
            ],
        ])->map(function (array $category) {
            $category['slug'] = Str::slug($category['label']);

            return $category;
        });
    }

    private function mapProjectFile(SplFileInfo $file, array $category): array
    {
        $filename = pathinfo($file->getFilename(), PATHINFO_FILENAME);
        $index = 9999;

        if (preg_match('/^(\d+)\./', $filename, $match)) {
            $index = (int) $match[1];
        } elseif (preg_match('/^0I\./i', $filename)) {
            $index = 1;
        }

        $cleanName = preg_replace('/^(\d+|0I)\.\s*/i', '', $filename) ?? $filename;
        [$name, $location] = array_pad(array_map('trim', explode(',', $cleanName, 2)), 2, '');

        $projectName = $name ?: $cleanName;
        $projectLocation = $location ?: 'India';
        $imagePath = 'images/projects/' . $category['folder'] . '/' . $file->getFilename();
        $imageUrl = asset($imagePath);
        $projectSlug = Str::slug($cleanName);

        $project = [
            'index' => $index,
            'name' => $projectName,
            'detail_title' => $projectName,
            'location' => $projectLocation,
            'category' => $category['label'],
            'display_category' => $category['label'],
            'category_slug' => $category['slug'],
            'project_slug' => $projectSlug,
            'image' => $imageUrl,
            'hero_image' => $imageUrl,
            'description' => $this->buildDescription($projectName, $projectLocation, $category['label']),
            'overview_heading' => 'A contextual architectural response grounded in clarity, performance, and long-term usability.',
            'overview' => $this->buildOverview($projectName, $projectLocation, $category['label']),
            'details' => [
                'Location' => $projectLocation,
                'Year' => 'Details on request',
                'Client' => 'Details on request',
                'Area' => 'Details on request',
            ],
            'hero_stats' => [
                ['label' => 'Location', 'value' => $projectLocation],
                ['label' => 'Sector', 'value' => $category['label']],
            ],
            'content_sections' => [],
            'gallery' => [
                [
                    'src' => $imageUrl,
                    'alt' => $projectName . ' main view',
                ],
                [
                    'src' => $imageUrl,
                    'alt' => $projectName . ' detail view',
                ],
                [
                    'src' => $imageUrl,
                    'alt' => $projectName . ' contextual view',
                ],
                [
                    'src' => $imageUrl,
                    'alt' => $projectName . ' wide composition',
                ],
                [
                    'src' => $imageUrl,
                    'alt' => $projectName . ' vertical composition',
                ],
            ],
        ];

        return $projectSlug === 'dhoot-transmission-jhajjar'
            ? $this->applyDhootTransmissionContent($project)
            : $project;
    }

    private function buildDescription(string $projectName, string $location, string $category): string
    {
        return sprintf(
            '%s is a %s project by Satya Architects in %s, shaped around contextual planning, material clarity, and functional precision.',
            $projectName,
            Str::lower($category),
            $location
        );
    }

    private function buildOverview(string $projectName, string $location, string $category): array
    {
        return [
            sprintf(
                '%s explores a calibrated response to %s through a %s design approach that balances spatial efficiency, long-term usability, and a refined architectural language.',
                $projectName,
                $location,
                Str::lower($category)
            ),
            sprintf(
                'For this project, Satya Architects developed the planning, massing, and material expression to create a built environment that feels rooted in context while remaining contemporary, durable, and adaptable over time.'
            ),
        ];
    }

    private function applyDhootTransmissionContent(array $project): array
    {
        $project['name'] = 'Dhoot Transmission';
        $project['detail_title'] = 'Dhoot Transmission - Integrated Industrial Facility';
        $project['location'] = 'Jhajjar';
        $project['display_category'] = 'Industrial Architecture';
        $project['description'] = 'The Dhoot Transmission Industrial Facility is conceived as a next-generation manufacturing campus that integrates operational efficiency with human-centric design.';
        $project['overview_heading'] = 'A next-generation manufacturing campus shaped around operational clarity and human experience.';
        $project['overview'] = [
            'The site is organized along a clear circulation hierarchy, anchored by a 6.0-meter-wide internal road that ensures efficient vehicular movement, logistics handling, and fire access.',
            'The administrative wing near the entrance includes MD cabins, conference rooms, meeting spaces, and open offices, allowing efficient oversight while maintaining acoustic and functional separation from the production areas.',
            'A dedicated training hall and product gallery act as knowledge hubs, reinforcing the company focus on skill development, innovation, and client engagement.',
            'Employee welfare is central to the design, with facilities such as a cafeteria, pantry, creche, and gender-inclusive sanitation blocks, ensuring a comfortable and inclusive work environment.',
        ];
        $project['details'] = [
            'Client' => 'M/S DHOOT TRANSMISSION PVT. LTD.',
            'Location' => 'RELIANCE MET JHAJJAR, HARYANA',
            'Site Area' => '24280.98 SQ. M (6.00 ACRE)',
            'Built-up Area' => '14631.632 SQMT. / 157500 SQFT.',
            'Sector' => 'INDUSTRIAL ARCHITECTURE',
        ];
        $project['hero_stats'] = [
            ['label' => 'Location', 'value' => 'Reliance MET Jhajjar, Haryana'],
            ['label' => 'Sector', 'value' => 'Industrial Architecture'],
            ['label' => 'Site Area', 'value' => '24280.98 sq. m'],
            ['label' => 'Built-up Area', 'value' => '14631.632 sqmt / 157500 sqft'],
        ];
        $project['gallery'] = $this->swapGalleryImages(
            $this->buildGalleryFromFolder('images/projects-details/dhoot', $project['detail_title']),
            'IMG_4024.jpg',
            'IMG_4026.jpg'
        );
        $project['hero_image'] = $this->findGalleryImageByFilename('images/projects-details/dhoot', 'IMG_4013.jpg') ?? $project['hero_image'];
        $project['factsheet_image'] = $this->findGalleryImageByFilename('images/projects-details/dhoot', 'dhoot.jpg');
        $project['content_sections'] = [
            [
                'eyebrow' => 'Project Description',
                'title' => 'An integrated industrial campus',
                'paragraphs' => [
                    'The Dhoot Transmission Industrial Facility is organized around a clear operational framework that balances industrial efficiency with a legible, human-scaled environment.',
                    'A 6.0-meter-wide internal road anchors the site planning, enabling efficient vehicular circulation, logistics handling, and fire access across the campus.',
                    'The administrative wing is positioned near the entrance with MD cabins, conference rooms, meeting spaces, and open offices, ensuring oversight while maintaining acoustic and functional separation from the production areas.',
                    'A dedicated training hall and product gallery reinforce the company focus on skill development, innovation, and client engagement.',
                ],
                'items' => [],
                'closing' => null,
                'image' => $project['gallery'][0] ?? null,
            ],
            [
                'eyebrow' => 'Sustainability Approach',
                'title' => 'Passive design and operational efficiency',
                'paragraphs' => [
                    'Sustainability is embedded through passive design intelligence and operational efficiency, rather than superficial additions.',
                ],
                'items' => [
                    'Maximizing daylight penetration to reduce energy demand',
                    'High-performance building envelope minimizing heat gain',
                    'Energy-efficient lighting systems across all zones',
                    'Integration of landscape buffers to improve microclimate',
                    'Provision for renewable energy integration in future phases',
                    'Rationalized water and waste management systems',
                ],
                'closing' => 'These measures collectively reduce the environmental footprint while enhancing user comfort and long-term viability.',
                'image' => $project['gallery'][1] ?? null,
            ],
            [
                'eyebrow' => 'Human-Centric Industrial Design',
                'title' => 'Industrial productivity centered on people',
                'paragraphs' => [
                    'A defining aspect of the project is its emphasis on people as the core of industrial productivity.',
                    'Employee welfare is central to the design, with facilities such as a cafeteria, pantry, creche, and gender-inclusive sanitation blocks, creating a more comfortable and inclusive working environment.',
                ],
                'items' => [
                    'A well-equipped training center',
                    'A creche supporting working families',
                    'Inclusive sanitation and welfare spaces',
                    'A thoughtfully designed cafeteria and breakout zones',
                ],
                'closing' => 'The project recognizes that efficiency is not just a function of machines, but of human experience.',
                'image' => $project['gallery'][2] ?? null,
            ],
        ];

        return $project;
    }

    private function buildGalleryFromFolder(string $relativeFolder, string $projectTitle): array
    {
        $folderPath = public_path($relativeFolder);
        $files = File::exists($folderPath) ? File::files($folderPath) : [];

        return collect($files)
            ->filter(fn (SplFileInfo $file) => in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp'], true))
            ->sortBy(fn (SplFileInfo $file) => $file->getFilename())
            ->values()
            ->map(function (SplFileInfo $file, int $index) use ($relativeFolder, $projectTitle) {
                return [
                    'src' => asset(trim($relativeFolder, '/') . '/' . $file->getFilename()),
                    'alt' => $projectTitle . ' image ' . ($index + 1),
                ];
            })
            ->all();
    }

    private function findGalleryImageByFilename(string $relativeFolder, string $filename): ?string
    {
        $filePath = public_path(trim($relativeFolder, '/') . '/' . $filename);

        return File::exists($filePath) ? asset(trim($relativeFolder, '/') . '/' . $filename) : null;
    }

    private function swapGalleryImages(array $gallery, string $firstFilename, string $secondFilename): array
    {
        $firstIndex = null;
        $secondIndex = null;

        foreach ($gallery as $index => $image) {
            $src = $image['src'] ?? '';

            if (Str::endsWith($src, '/' . $firstFilename)) {
                $firstIndex = $index;
            }

            if (Str::endsWith($src, '/' . $secondFilename)) {
                $secondIndex = $index;
            }
        }

        if ($firstIndex !== null && $secondIndex !== null) {
            [$gallery[$firstIndex], $gallery[$secondIndex]] = [$gallery[$secondIndex], $gallery[$firstIndex]];
        }

        return $gallery;
    }
}
