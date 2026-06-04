# Featured Categories Sort Feature - Complete Guide

## Overview
Home page par featured categories ko sort karne ke liye `sort` field use hota hai. Admin panel se sort order set kiya ja sakta hai.

## SQL Query (Run Karein)

**File:** `add_sort_to_categories.sql`

```sql
ALTER TABLE `categories` ADD COLUMN `sort` INT(11) DEFAULT 0 AFTER `show_on_home`;
```

**Note:** Agar migration already run ho chuki hai to SQL run karne ki zarurat nahi hai.

---

## Files Updated (Already Done ✅)

### 1. **Controller - Admin Side** ✅
**File:** `app/Http/Controllers/Admins/AdminController.php`

**Changes:**
- Line 330: Sort field save karta hai (update ke liye)
- Line 379: Sort field save karta hai (create ke liye)  
- Line 420: Categories ko sort order ke hisab se fetch karta hai

### 2. **View - Admin Side** ✅
**File:** `resources/views/admins/category.blade.php`

**Changes:**
- Line 44-48: Sort input field add kiya form mein
- Line 139: Sort column add kiya table header mein
- Line 152: Sort value display karta hai table mein

### 3. **Controller - Frontend (Home Page)** ✅
**File:** `app/Http/Controllers/Front/FrontController.php`

**Changes:**
- Line 355-358: Featured categories ko sort field se fetch karta hai (`home()` method)
- Line 489-492: Featured categories ko sort field se fetch karta hai (`home1()` method)

**Updated Code:**
```php
// Fetch featured categories with their products (sorted by sort field)
$featured_categories = Category::where('status', 1)
    ->where('show_on_home', 1)
    ->orderBy('sort', 'ASC')
    ->orderBy('id', 'DESC')
    ->get();
```

---

## How It Works

1. **Admin Panel:**
   - Admin category form mein **Sort Order** field dikhega
   - Number enter karein (lower number = higher priority)
   - Categories list mein **Sort** column dikhega

2. **Home Page:**
   - Featured categories (show_on_home = 1) ko sort order ke hisab se display hongi
   - Lower sort number wali categories pehle dikhengi
   - Agar sort number same hai to ID ke hisab se DESC order mein

3. **Sorting Logic:**
   - `orderBy('sort', 'ASC')` - Sort field ascending order
   - `orderBy('id', 'DESC')` - Agar sort same ho to ID descending

---

## Files Summary

### **Files to Update:**
1. ✅ `app/Http/Controllers/Admins/AdminController.php` - Updated
2. ✅ `resources/views/admins/category.blade.php` - Updated
3. ✅ `app/Http/Controllers/Front/FrontController.php` - Updated

### **SQL Query:**
- ✅ `add_sort_to_categories.sql` - Created

### **View Files (No Changes Needed):**
- `resources/views/theme2/featured_categories.blade.php` - Already uses `$featured_categories` variable

---

## Testing Steps

1. **Run SQL Query:**
   ```sql
   ALTER TABLE `categories` ADD COLUMN `sort` INT(11) DEFAULT 0 AFTER `show_on_home`;
   ```

2. **Admin Panel:**
   - Go to `/admin/category`
   - Edit any category
   - Set Sort Order (e.g., 1, 2, 3)
   - Save

3. **Home Page:**
   - Visit homepage
   - Check featured categories order
   - Categories should appear in sort order

---

## Notes

- Default sort value: 0
- Lower numbers appear first
- Categories with same sort number will be ordered by ID (DESC)
- Only categories with `show_on_home = 1` are displayed on homepage

