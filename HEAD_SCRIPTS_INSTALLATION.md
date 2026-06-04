# Head Scripts Feature Installation Guide

## Feature Description
This feature allows you to add custom scripts (like Google Analytics, Facebook Pixel, etc.) to the `<head>` section of all pages from the admin settings panel.

## Installation Steps

### Step 1: Run SQL Query
Execute the following SQL query in your database (phpMyAdmin or MySQL command line):

```sql
ALTER TABLE `setting` ADD COLUMN `head_scripts` LONGTEXT NULL AFTER `theme_style`;
```

**OR** 

Import the file: `add_head_scripts.sql`

### Step 2: Files Updated (Already Done)

The following files have been automatically updated:

1. **Database Migration**: `database/migrations/2025_12_04_065716_add_head_scripts_to_settings_table.php`
   - Migration file created (can be run later if needed)

2. **Model**: `app/Models/Admins/Setting.php`
   - Added `head_scripts` to fillable array

3. **Controller**: `app/Http/Controllers/Admins/AdminController.php`
   - Added code to save `head_scripts` field

4. **Admin Form**: `resources/views/admins/setting.blade.php`
   - Added textarea field in SEO tab for entering scripts

5. **Frontend Layout**: `resources/views/theme2/layout.blade.php`
   - Added code to display scripts in `<head>` section

### Step 3: How to Use

1. Go to Admin Panel → Settings
2. Click on "SEO" tab
3. Scroll down to "Head Scripts" field
4. Add your tracking scripts (Google Analytics, Facebook Pixel, etc.)
5. Click "Save"

### Example Scripts to Add

**Google Analytics:**
```html
<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'GA_MEASUREMENT_ID');
</script>
```

**Facebook Pixel:**
```html
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', 'YOUR_PIXEL_ID');
fbq('track', 'PageView');
</script>
```

## Notes

- Scripts will appear on ALL pages of the website
- Make sure to test scripts after adding them
- Scripts are loaded in the `<head>` section before the closing `</head>` tag

## Support

If you face any issues, contact your developer.

