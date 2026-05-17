<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;

class BlogController extends Controller
{
    public function insights()
    {
        return view('insights', [
            'blogPosts' => $this->blogPosts(),
        ]);
    }

    public function show(string $slug)
    {
        $posts = collect($this->blogPosts());
        $blog = $posts->firstWhere('slug', $slug);

        abort_unless($blog, 404);

        $relatedPosts = $posts
            ->reject(fn (array $post) => $post['slug'] === $slug)
            ->take(3)
            ->values()
            ->all();

        return view('blog-detail', [
            'blog' => $blog,
            'relatedPosts' => $relatedPosts,
        ]);
    }

    private function blogPosts(): array
    {
        return [
            [
                'slug' => 'where-global-energy-dialogue-met-architecture',
                'image' => asset('images/projects-details/fit/01.jpg'),
                'date' => 'February 10, 2026',
                'title' => 'Where Global Energy Dialogue Met Architecture',
                'excerpt' => 'The successful conclusion of India Energy Week 2026 at the International Convention and Expo Centre, Goa has positioned the venue as one of India\'s most significant contemporary civic and architectural destinations for global engagement.',
                'body' => [
                    'Large international events are judged not only by attendance but by how effectively the built environment supports movement, safety, and experience. The venue at Goa demonstrated how architecture can carry this operational responsibility without losing identity.',
                    'From arrival sequencing to interior transitions, the planning language balanced ceremonial scale and practical clarity. This is where architecture adds value beyond visual expression: it enables high-capacity performance under real-time pressure.',
                    'For design teams in India, the project is a reference for how civic infrastructure can represent national ambition while still being rooted in context, climate response, and long-term usability.',
                    'The key takeaway is simple: when architecture and event strategy are aligned from the start, public infrastructure becomes a cultural and economic catalyst rather than a one-time backdrop.',
                ],
            ],
            [
                'slug' => 'delhi-smog-symptom-of-diseased-urban-planning',
                'image' => asset('images/hero/new/03.jpg'),
                'date' => 'February 04, 2026',
                'title' => 'Delhi\'s Smog Is a Symptom of Diseased Urban Planning',
                'excerpt' => 'Every winter, Delhi\'s air turns hostile. We speak of smog, of choking lungs, of emergency measures, of temporary restrictions, but the underlying urban planning crisis remains unresolved.',
                'body' => [
                    'Air quality in Delhi is often discussed as a seasonal emergency, but its causes are deeply structural. Land-use fragmentation, car-first mobility patterns, and low-performance urban form have compounded pressure on the regional environment.',
                    'Planning responses cannot remain reactive. Street hierarchy, last-mile public transport, mixed-use density, and urban tree systems must be addressed as a single framework rather than disconnected projects.',
                    'Architects and planners also need measurable implementation metrics: shade coverage, pedestrian comfort, modal split, and district-level emissions intensity should sit alongside traditional development indicators.',
                    'Cleaner air is not an isolated policy outcome; it is the product of coherent urban design decisions repeated consistently over time.',
                ],
            ],
            [
                'slug' => 'hrrl-township-barmer',
                'image' => asset('images/projects-details/fit/05.jpg'),
                'date' => 'November 24, 2025',
                'title' => 'HRRL Township, Barmer',
                'excerpt' => 'The township spans 248 acres and is designed to accommodate residential, institutional, and security infrastructure with long-term planning and service integration.',
                'body' => [
                    'Large-format townships in industrial regions require more than parcel layouts; they require durable service logic. In Barmer, infrastructure integration was approached as a foundational design problem from day one.',
                    'The framework prioritized zoning legibility, phased utility deployment, and safe interface points between residential and operational zones. This improves both day-to-day performance and long-term maintenance efficiency.',
                    'Environmental comfort in high-heat contexts depends on orientation, landscape buffering, and defensible open-space planning. These decisions influence energy demand and social usability at the same time.',
                    'Projects at this scale are successful when they are planned as systems, not just as collections of buildings.',
                ],
            ],
            [
                'slug' => 'how-ai-can-prepare-budding-architects',
                'image' => asset('images/expertise/new/architecture.jpg'),
                'date' => 'September 7, 2023',
                'title' => 'How AI Can Prepare Budding Architects for the Professional World',
                'excerpt' => 'Artificial Intelligence has become the defining word for this decade. It has birthed many tools that have made it clear that AI will impact our personal and professional lives significantly.',
                'body' => [
                    'For architecture students, AI is most useful when treated as a thinking assistant rather than an autopilot. It can accelerate option studies, precedent discovery, and iterative communication during early-stage design.',
                    'The professional advantage is not in producing generic outputs faster; it is in asking better questions and validating decisions with stronger evidence.',
                    'Studios that combine domain fundamentals with digital fluency will graduate architects who are ready for multidisciplinary collaboration and faster delivery environments.',
                    'AI literacy should therefore be integrated with design ethics, context sensitivity, and technical rigor—not separated from them.',
                ],
            ],
            [
                'slug' => 'climate-responsive-community-housing-north-india',
                'image' => asset('images/hero/new/05.jpg'),
                'date' => 'August 21, 2023',
                'title' => 'Designing Climate-Responsive Community Housing in North India',
                'excerpt' => 'Housing projects in rapidly growing cities need to balance density with dignity. Passive orientation, shaded movement corridors, and mixed-use social pockets are proving critical for long-term liveability.',
                'body' => [
                    'Community housing cannot be evaluated only by unit counts. Outdoor thermal comfort, social adjacency, and walkability are equally important performance criteria in high-density environments.',
                    'Passive strategies such as orientation control, shaded edges, and ventilation corridors lower energy intensity while improving everyday comfort for residents.',
                    'Design teams should also prioritize adaptable shared spaces that support changing family structures and mixed-age communities over time.',
                    'The most resilient housing ecosystems are those that integrate environmental response with social functionality from the concept stage.',
                ],
            ],
            [
                'slug' => 'industrial-campuses-planned-around-people',
                'image' => asset('images/projects-details/dhoot/IMG_4018.jpg'),
                'date' => 'July 12, 2023',
                'title' => 'Industrial Campuses Must Be Planned Around People, Not Only Production',
                'excerpt' => 'Future-ready industrial facilities must include welfare, training, and inclusive amenities from day one. Productivity grows when human experience is treated as core infrastructure.',
                'body' => [
                    'Industrial architecture has historically prioritized throughput over workplace quality. That tradeoff is no longer valid in competitive, talent-sensitive manufacturing ecosystems.',
                    'Training hubs, welfare amenities, and safe circulation are now productivity infrastructure. They reduce friction, improve retention, and support stronger operational continuity.',
                    'Planning for inclusivity—from sanitation access to childcare support—also strengthens workforce participation and improves social equity within industrial regions.',
                    'Human-centric planning should be measured as a business enabler, not an optional enhancement.',
                ],
            ],
            [
                'slug' => 'masterplanning-for-logistics-corridors',
                'image' => asset('images/hero/new/06.jpg'),
                'date' => 'May 03, 2023',
                'title' => 'Masterplanning for Logistics Corridors: What Actually Works',
                'excerpt' => 'Efficient freight movement depends on hierarchy: clear road networks, service access segregation, and resilient utility planning. Masterplans that resolve these fundamentals avoid costly retrofits later.',
                'body' => [
                    'Logistics-led developments fail when circulation logic is treated as an afterthought. Corridor planning must clearly separate freight, service, and human movement at the spatial structure level.',
                    'Utility resilience is equally important: water, power, and digital systems should be phased with realistic peak-load assumptions, not baseline occupancy assumptions.',
                    'Operational clarity depends on predictable geometry, fewer conflict points, and extensible infrastructure. These fundamentals influence lifecycle cost more than visual form.',
                    'Well-masterplanned corridors improve reliability for operators and create long-term regional competitiveness.',
                ],
            ],
            [
                'slug' => 'township-infrastructure-as-value-multiplier',
                'image' => asset('images/projects-details/fit/10.jpg'),
                'date' => 'March 18, 2023',
                'title' => 'Township Infrastructure as a Long-Term Value Multiplier',
                'excerpt' => 'Integrated townships perform best when mobility, landscape, and service systems are planned as one framework. Infrastructure quality directly influences occupancy, operating efficiency, and asset value.',
                'body' => [
                    'Townships are often marketed through built form, but their sustained value is determined by infrastructure quality. Mobility, drainage, public realm, and utility reliability are the true long-term differentiators.',
                    'Investors and end users respond to predictability: lower maintenance risk, better service uptime, and easier future expansion translate directly into stronger asset confidence.',
                    'Landscape infrastructure should also be treated as performance infrastructure. It improves microclimate, stormwater behavior, and overall user experience across seasons.',
                    'When infrastructure is planned as an integrated system, townships move from transactional development toward durable urban value.',
                ],
            ],
        ];
    }
}
