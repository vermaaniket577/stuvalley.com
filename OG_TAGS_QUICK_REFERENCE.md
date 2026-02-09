# 🚀 OG Tags Quick Reference - Stuvalley Technology

## ⚡ Quick Start (3 Steps)

### 1. Include OG Tags in Layout
**File:** `resources/views/layouts/app.blade.php`  
**Line:** ~35-40 (in `<head>` section)

**Add:**
```blade
@include('partials.og-tags')
```

### 2. Create OG Images (1200x630px)
Place in `public/images/`:
- `og-default.jpg` (Homepage)
- `og-blog.jpg` (Blog)
- `og-services.jpg` (Services)
- `og-about.jpg` (About)
- `og-contact.jpg` (Contact)

### 3. Update Twitter Handle
**File:** `resources/views/partials/og-tags.blade.php`  
**Line:** 27

```php
$twitter_site = '@YourTwitterHandle';
```

---

## 📸 Image Specs

| Property | Value |
|----------|-------|
| **Size** | 1200 x 630 px |
| **Ratio** | 1.91:1 |
| **Format** | JPG or PNG |
| **Max Size** | 8MB (recommend <1MB) |
| **Min Size** | 600 x 315 px |

---

## 🧪 Testing URLs

| Platform | URL |
|----------|-----|
| **Facebook** | https://developers.facebook.com/tools/debug/ |
| **LinkedIn** | https://www.linkedin.com/post-inspector/ |
| **Twitter** | https://cards-dev.twitter.com/validator |
| **WhatsApp** | Send link to yourself |

---

## ✅ What's Included

### Essential OG Tags
- ✅ og:title
- ✅ og:description  
- ✅ og:image
- ✅ og:url
- ✅ og:type
- ✅ og:site_name

### Twitter Cards
- ✅ twitter:card
- ✅ twitter:title
- ✅ twitter:description
- ✅ twitter:image

### Article Tags (Blog)
- ✅ article:published_time
- ✅ article:author
- ✅ article:section
- ✅ article:tag

---

## 🎯 Supported Pages

| Page | OG Title | OG Image |
|------|----------|----------|
| **Home** | Stuvalley Technology - Transforming Ideas... | og-default.jpg |
| **Blog List** | Blog - Latest Tech Insights | og-blog.jpg |
| **Blog Post** | {Post Title} - Stuvalley Blog | {Post Image} or og-blog.jpg |
| **Services** | Our Services - Complete Digital Solutions | og-services.jpg |
| **Service** | {Service Name} - Stuvalley Services | {Service Image} or og-services.jpg |
| **About** | About Us - Our Story & Mission | og-about.jpg |
| **Contact** | Contact Us - Get In Touch | og-contact.jpg |

---

## ⚠️ Common Mistakes

| ❌ Wrong | ✅ Correct |
|---------|-----------|
| `/images/og.jpg` | `asset('images/og.jpg')` |
| Image size 500x500 | Image size 1200x630 |
| Missing fallback image | Always have og-default.jpg |
| HTML in description | Strip tags with `strip_tags()` |
| Forgot to test | Test with Facebook Debugger |

---

## 🔄 After Making Changes

```bash
# 1. Clear Laravel cache
php artisan cache:clear
php artisan view:clear

# 2. Test with debuggers
# - Facebook Debugger → "Scrape Again"
# - LinkedIn Inspector → "Inspect"
# - Twitter Validator → "Preview card"

# 3. Wait 24-48 hours for full propagation
```

---

## 📱 Platform Compatibility

| Platform | Status | Notes |
|----------|--------|-------|
| Facebook | ✅ Full Support | Uses OG tags |
| WhatsApp | ✅ Full Support | Uses Facebook cache |
| LinkedIn | ✅ Full Support | Prefers 1200x627 |
| Twitter/X | ✅ Full Support | Uses Twitter Card tags |
| Telegram | ✅ Full Support | Uses OG tags |
| Slack | ✅ Full Support | Uses OG tags |
| Discord | ✅ Full Support | Uses OG tags |

---

## 🎨 Design Tools

| Tool | Best For | Link |
|------|----------|------|
| **Canva** | Beginners | canva.com |
| **Figma** | Designers | figma.com |
| **Adobe Express** | Quick edits | adobe.com/express |
| **Photoshop** | Professionals | adobe.com/photoshop |

---

## 📋 Pre-Launch Checklist

- [ ] Created all 5 OG images (1200x630px)
- [ ] Placed images in `public/images/`
- [ ] Added `@include('partials.og-tags')` to layout
- [ ] Updated Twitter handle
- [ ] Tested homepage with Facebook Debugger
- [ ] Tested blog post with LinkedIn Inspector
- [ ] Tested on WhatsApp
- [ ] Verified images load (check Network tab)
- [ ] Cleared all caches
- [ ] Checked mobile preview

---

## 🆘 Troubleshooting

### Image not showing?
1. Check image exists in `public/images/`
2. Verify URL is absolute (starts with http://)
3. Clear cache: `php artisan cache:clear`
4. Use Facebook Debugger → "Scrape Again"

### Wrong preview showing?
1. Clear social media cache (Facebook Debugger)
2. Wait 24-48 hours
3. Check if URL is correct

### Image too small/blurry?
1. Ensure image is 1200x630px
2. Use high-quality source image
3. Export at 2x resolution if possible

---

## 📞 Need Help?

1. Check `OG_TAGS_IMPLEMENTATION.md` for detailed guide
2. View `public/og-image-templates.html` for design examples
3. Test with social media debuggers
4. Verify image URLs in browser DevTools

---

**Files Created:**
- ✅ `resources/views/partials/og-tags.blade.php` - OG tags partial
- ✅ `OG_TAGS_IMPLEMENTATION.md` - Full documentation
- ✅ `public/og-image-templates.html` - Visual templates
- ✅ `OG_TAGS_QUICK_REFERENCE.md` - This file

**Website:** https://stuvalley.com  
**Company:** Stuvalley Technology Pvt. Ltd.
