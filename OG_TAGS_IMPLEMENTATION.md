# Open Graph (OG) Tags Implementation Guide
## Stuvalley Technology Pvt. Ltd.

---

## 📋 Overview

This guide provides complete instructions for implementing SEO-optimized Open Graph (OG) meta tags for your website to ensure proper link previews on:
- ✅ Facebook
- ✅ WhatsApp
- ✅ LinkedIn
- ✅ Twitter/X
- ✅ Telegram
- ✅ Other social platforms

---

## 🎯 Quick Implementation

### Step 1: Include OG Tags in Layout

**File:** `resources/views/layouts/app.blade.php`

**Location:** Inside the `<head>` section (around line 35-40)

**Replace the existing OG tags:**
```blade
<!-- Open Graph / Social Media -->
<meta property="og:title" content="{{ $seo_meta->title ?? 'Stuvalley Technology' }}">
<meta property="og:description" content="{{ $seo_meta->description ?? '' }}">
@if(isset($seo_meta->image))
    <meta property="og:image" content="{{ asset('storage/' . $seo_meta->image) }}">
@endif
```

**With:**
```blade
{{-- Include comprehensive OG tags --}}
@include('partials.og-tags')
```

---

## 📸 OG Image Requirements

### Recommended Specifications:
- **Size:** 1200 x 630 pixels (1.91:1 ratio)
- **Minimum:** 600 x 315 pixels
- **Maximum File Size:** 8MB
- **Format:** JPG or PNG
- **Quality:** High resolution, clear text if any

### Required Images:

Create these images and place them in `public/images/`:

1. **og-default.jpg** (1200x630px)
   - Homepage/fallback image
   - Should feature your logo and tagline
   - Professional, branded design

2. **og-blog.jpg** (1200x630px)
   - Blog listing page
   - Can include "Blog" text and tech imagery

3. **og-about.jpg** (1200x630px)
   - About page
   - Team photo or company building

4. **og-services.jpg** (1200x630px)
   - Services page
   - Service icons or professional imagery

5. **og-contact.jpg** (1200x630px)
   - Contact page
   - Contact information or CTA design

---

## 🔧 Implementation Steps

### 1. Create Default OG Images

```bash
# Create images directory if it doesn't exist
mkdir -p public/images
```

Then add your OG images to `public/images/`:
- og-default.jpg
- og-blog.jpg
- og-about.jpg
- og-services.jpg
- og-contact.jpg

### 2. Update Layout File

**File:** `resources/views/layouts/app.blade.php`

**Find (around line 35-40):**
```blade
<!-- Open Graph / Social Media -->
<meta property="og:title" content="{{ $seo_meta->title ?? 'Stuvalley Technology' }}">
<meta property="og:description" content="{{ $seo_meta->description ?? '' }}">
@if(isset($seo_meta->image))
    <meta property="og:image" content="{{ asset('storage/' . $seo_meta->image) }}">
@endif
```

**Replace with:**
```blade
{{-- Include comprehensive OG tags --}}
@include('partials.og-tags')
```

### 3. Update Twitter Handle

**File:** `resources/views/partials/og-tags.blade.php`

**Find (line 27):**
```php
$twitter_site = '@stuvalley'; // Replace with your Twitter handle
```

**Replace with your actual Twitter/X handle:**
```php
$twitter_site = '@YourActualHandle';
```

### 4. Pass Blog Post Data to View

**File:** `app/Http/Controllers/BlogController.php`

**For show() method, ensure you're passing the post:**
```php
public function show($slug)
{
    $post = BlogPost::where('slug', $slug)->firstOrFail();
    return view('blog.show', compact('post'));
}
```

---

## 📝 Page-Specific Customization

### Homepage
```php
$og_title = 'Stuvalley Technology Pvt. Ltd. - Transforming Ideas into E-Innovation';
$og_description = 'Leading IT & Digital Services Company...';
$og_image = asset('images/og-default.jpg');
```

### Blog Listing
```php
$og_title = 'Blog - Stuvalley Technology | Latest Tech Insights';
$og_image = asset('images/og-blog.jpg');
```

### Individual Blog Post
```php
$og_title = $post->title . ' - Stuvalley Technology Blog';
$og_description = $post->meta_description ?? Str::limit(strip_tags($post->content), 155);
$og_image = $post->featured_image ? asset('storage/' . $post->featured_image) : asset('images/og-blog.jpg');
```

---

## 🧪 Testing Your OG Tags

### 1. Facebook Debugger
**URL:** https://developers.facebook.com/tools/debug/

Steps:
1. Enter your URL
2. Click "Debug"
3. Check preview
4. Click "Scrape Again" if you made changes

### 2. LinkedIn Post Inspector
**URL:** https://www.linkedin.com/post-inspector/

Steps:
1. Enter your URL
2. Click "Inspect"
3. View preview

### 3. Twitter Card Validator
**URL:** https://cards-dev.twitter.com/validator

Steps:
1. Enter your URL
2. Click "Preview card"

### 4. WhatsApp Testing
Simply send the link to yourself on WhatsApp and check the preview.

---

## ⚠️ Common Mistakes to Avoid

### 1. ❌ Using Relative URLs
**Wrong:**
```php
$og_image = '/images/og-default.jpg';
```

**Correct:**
```php
$og_image = asset('images/og-default.jpg');
// or
$og_image = url('/images/og-default.jpg');
```

### 2. ❌ Missing OG Image
Always provide a fallback:
```php
$og_image = $post->featured_image 
    ? asset('storage/' . $post->featured_image) 
    : asset('images/og-default.jpg');
```

### 3. ❌ Wrong Image Size
- Too small: Will appear pixelated
- Too large: Slow loading
- Wrong ratio: Will be cropped awkwardly

**Correct:** 1200x630px (1.91:1 ratio)

### 4. ❌ Cache Issues
Social platforms cache OG data. After making changes:
1. Clear your cache
2. Use Facebook Debugger to "Scrape Again"
3. Wait 24-48 hours for full propagation

### 5. ❌ Missing og:url
Always include the canonical URL:
```php
<meta property="og:url" content="{{ url()->current() }}">
```

### 6. ❌ HTML in Description
**Wrong:**
```php
$og_description = $post->content; // Contains HTML
```

**Correct:**
```php
$og_description = Str::limit(strip_tags($post->content), 155);
```

---

## 🎨 Creating OG Images

### Design Tips:
1. **Use your brand colors**
2. **Include your logo**
3. **Keep text large and readable** (minimum 60px font)
4. **Avoid small details** (will be hard to see in thumbnails)
5. **Use high contrast**
6. **Test on mobile** (most shares happen on mobile)

### Recommended Tools:
- **Canva:** https://www.canva.com (Free templates)
- **Figma:** https://www.figma.com (Professional design)
- **Adobe Express:** https://www.adobe.com/express (Quick creation)

### Free Templates:
- Search "OG image template 1200x630"
- Use Canva's "Facebook Post" template (resize to 1200x630)

---

## 📊 OG Tags Included

### Essential Tags:
- ✅ og:title
- ✅ og:description
- ✅ og:image
- ✅ og:url
- ✅ og:type
- ✅ og:site_name
- ✅ og:locale

### Image Properties:
- ✅ og:image:width
- ✅ og:image:height
- ✅ og:image:alt
- ✅ og:image:type

### Article Tags (for blog posts):
- ✅ article:published_time
- ✅ article:modified_time
- ✅ article:author
- ✅ article:section
- ✅ article:tag

### Twitter Card Tags:
- ✅ twitter:card
- ✅ twitter:site
- ✅ twitter:title
- ✅ twitter:description
- ✅ twitter:image
- ✅ twitter:image:alt

---

## 🔄 Cache Clearing

After implementing OG tags:

### 1. Clear Laravel Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### 2. Clear Social Media Cache
- **Facebook:** Use Debugger tool
- **LinkedIn:** Use Post Inspector
- **Twitter:** Cache clears automatically (24-48 hours)
- **WhatsApp:** No manual clearing needed

---

## 📱 Platform-Specific Notes

### Facebook
- Caches aggressively (use Debugger to force refresh)
- Prefers 1200x630px images
- Shows description up to 300 characters

### WhatsApp
- Uses Facebook's OG cache
- Shows image, title, and description
- No special tags needed

### LinkedIn
- Prefers 1200x627px images
- Shows up to 150 characters of description
- Respects og:see_also for related links

### Twitter/X
- Uses Twitter Card tags
- Falls back to OG tags if Twitter tags missing
- Supports summary and summary_large_image cards

---

## 🚀 Advanced Features

### Dynamic Blog Post Images
If your blog posts have featured images:
```php
$og_image = $post->featured_image 
    ? asset('storage/' . $post->featured_image) 
    : asset('images/og-blog.jpg');
```

### Multiple Languages
Add locale variations:
```blade
<meta property="og:locale" content="en_US">
<meta property="og:locale:alternate" content="hi_IN">
```

### Video Content
For video pages:
```blade
<meta property="og:type" content="video.other">
<meta property="og:video" content="{{ $video_url }}">
```

---

## ✅ Checklist

Before going live:

- [ ] Created all required OG images (1200x630px)
- [ ] Placed images in `public/images/`
- [ ] Included `@include('partials.og-tags')` in layout
- [ ] Updated Twitter handle
- [ ] Tested with Facebook Debugger
- [ ] Tested with LinkedIn Inspector
- [ ] Tested with WhatsApp
- [ ] Verified all images load (absolute URLs)
- [ ] Checked mobile preview
- [ ] Cleared all caches

---

## 📞 Support

If you encounter issues:
1. Check browser console for errors
2. Verify image URLs are absolute
3. Test with social media debuggers
4. Clear all caches
5. Wait 24-48 hours for propagation

---

## 📚 Additional Resources

- [Facebook OG Documentation](https://developers.facebook.com/docs/sharing/webmasters)
- [Twitter Card Documentation](https://developer.twitter.com/en/docs/twitter-for-websites/cards/overview/abouts-cards)
- [LinkedIn Share Documentation](https://www.linkedin.com/help/linkedin/answer/46687)
- [OG Image Best Practices](https://www.opengraph.xyz/)

---

**Created for:** Stuvalley Technology Pvt. Ltd.  
**Website:** https://stuvalley.com  
**Last Updated:** {{ date('Y-m-d') }}
