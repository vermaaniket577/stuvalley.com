<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use Carbon\Carbon;

class BlogPostSeeder extends Seeder
{
    public function run()
    {
        $posts = [
            [
                'title' => 'Virtualization in Cloud Computing: Definition, Types, and Benefits',
                'slug' => 'virtualization-in-cloud-computing',
                'excerpt' => 'Discover how virtualization transforms physical hardware into flexible, scalable virtual resources in the cloud.',
                'content' => '<h2>Understanding Virtualization</h2><p>Virtualization is a fundamental technology that powers cloud computing. It allows a single physical server to run multiple virtual machines (VMs), each acting as an independent computer with its own operating system and applications.</p><h3>How It Works</h3><p>A software layer called a <strong>hypervisor</strong> sits between the hardware and the virtual machines. It manages the allocation of CPU, memory, and storage resources to each VM in real-time.</p><h3>Types of Virtualization</h3><ul><li><strong>Server Virtualization:</strong> The most common type, dividing physical servers.</li><li><strong>Network Virtualization:</strong> abstracting network hardware into software-defined networks.</li><li><strong>Storage Virtualization:</strong> Combining multiple physical storage devices into a single virtual unit.</li></ul><h3>Key Benefits</h3><blockquote>Virtualization is the bridge that allows businesses to achieve extreme efficiency and agility in the digital age.</blockquote><ul><li><strong>Resource Optimization:</strong> Maximize the use of physical hardware.</li><li><strong>Cost Reduction:</strong> Fewer physical servers mean lower energy and maintenance costs.</li><li><strong>Scalability:</strong> Spin up new environments in minutes.</li></ul>',
                'featured_image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1200&auto=format&fit=crop',
                'author' => 'Aniket Singh',
                'category' => 'Cloud',
                'reading_time' => 8,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title' => 'Explore The Best Android App Development Frameworks',
                'slug' => 'android-app-development-frameworks',
                'excerpt' => 'A comprehensive guide to modern frameworks used for building robust Android applications in 2024.',
                'content' => '<h2>Modern Android Development</h2><p>The Android ecosystem has evolved significantly. Choosing the right framework is crucial for success.</p><h3>Top Frameworks</h3><ul><li><strong>Kotlin Multiplatform:</strong> Sharing code between Android and iOS while maintaining native performance.</li><li><strong>Flutter:</strong> Google\'s UI toolkit for building beautiful, natively compiled applications.</li><li><strong>React Native:</strong> Building mobile apps using JavaScript and React.</li><li><strong>Jetpack Compose:</strong> Android\'s modern toolkit for building native UI entirely in Kotlin.</li></ul><h3>Why Frameworks Matter</h3><p>Frameworks provide the building blocks that accelerate development and ensure consistency across devices.</p><h3>Our Recommendation</h3><p>For most enterprise-grade projects, we recommend a native-first approach with Jetpack Compose or Kotlin Multiplatform for the best user experience.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?q=80&w=1200&auto=format&fit=crop',
                'author' => 'Tech Lead',
                'category' => 'Mobile',
                'reading_time' => 12,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => '15 Best Minimalist Web Design Examples for Inspiration',
                'slug' => 'minimalist-web-design-examples',
                'excerpt' => 'Learn how less is more with these stunning examples of minimalist web design that focus on user experience.',
                'content' => '<h2>The Power of Minimalism</h2><p>Minimalism isn\'t about the absence of design; it\'s about the presence of only what matters. Clean lines, ample white space, and purposeful typography define this aesthetic.</p><h3>Core Principles</h3><ul><li><strong>Negative Space:</strong> Using white space to draw attention to key elements.</li><li><strong>Typography:</strong> Using bold, clear fonts as a primary design element.</li><li><strong>Limited Color Palettes:</strong> Focusing on a few core colors to create harmony.</li></ul><h3>Success Stories</h3><p>Brands like Apple, Airbnb, and various tech startups have mastered the art of minimalism to create high-converting, premium user experiences.</p><blockquote>In design, perfection is achieved not when there is nothing more to add, but when there is nothing left to take away.</blockquote>',
                'featured_image' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?q=80&w=1200&auto=format&fit=crop',
                'author' => 'Creative Director',
                'category' => 'Design',
                'reading_time' => 6,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(10),
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }
    }
}
