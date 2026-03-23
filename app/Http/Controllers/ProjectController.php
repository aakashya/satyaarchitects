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

        $currentIndex = $projects->search(function (array $item) use ($projectItem) {
            return $item['category_slug'] === $projectItem['category_slug']
                && $item['project_slug'] === $projectItem['project_slug'];
        });

        $nextProject = $projects->get(($currentIndex + 1) % $projects->count());

        return view('project-detail', [
            'project' => $projectItem,
            'nextProject' => $nextProject,
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
            'description' => $this->buildDescription($projectName, $projectLocation, $category['label']),
            'overview' => $this->buildOverview($projectName, $projectLocation, $category['label']),
            'details' => [
                'Location' => $projectLocation,
                'Year' => 'Details on request',
                'Client' => 'Details on request',
                'Area' => 'Details on request',
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
        $project['content_sections'] = [
            [
                'title' => 'Sustainability Approach',
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
            ],
            [
                'title' => 'Human-Centric Industrial Design',
                'paragraphs' => [
                    'A defining aspect of the project is its emphasis on people as the core of industrial productivity.',
                ],
                'items' => [
                    'A well-equipped training center',
                    'A creche supporting working families',
                    'Inclusive sanitation and welfare spaces',
                    'A thoughtfully designed cafeteria and breakout zones',
                ],
                'closing' => 'The project recognizes that efficiency is not just a function of machines, but of human experience.',
            ],
        ];
        $project['gallery'] = $this->buildGalleryFromFolder('images/projects-details/dhoot', $project['detail_title']);

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
}
