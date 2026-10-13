# All Star Tower Rater V.4

**All Star Tower Rater** is a tool designed to enhance the pro experience of playing **All Star Tower Defense** on Roblox.  
It offers advanced features like unit comparison and stat visualizations to help players optimize their team building.

---

## Features

- **Advanced Unit Search Engine**: Quickly search for units based on various attributes and stats.  
- **Unit Comparator**: Compare multiple units side-by-side to determine the best for your team.  
- **Stats Visuals**: Visualizations of unit stats to make analysis easier.  
- **Internal Glossary**: Explain every technical term that is used in the project.  
- **Premium Informations**: Private access to pro document that can be useful for your player experience.

---

## How to Install Locally (XAMPP)

1. Download the database:  
   `assets/csv_db/all_star_tower_rater.sql`

2. Choose the desired version from the `All_Star_Tower_Rater_v4` folder.

3. Install [XAMPP](https://www.apachefriends.org/index.html)

4. In your `xampp/htdocs/` directory, create a folder named:  
   `All_Star_Tower_Rater`

5. Copy the selected version into that folder.

6. Set up the database:

### Option 1 – Replace XAMPP data folder:
- Download the `data` folder.
- Rename your existing XAMPP MySQL `data` folder to `backup`.
- Copy and paste the downloaded `data` into the XAMPP MySQL directory.

### Option 2 – Manual import via phpMyAdmin:
- Open phpMyAdmin via XAMPP.
- Create a new database named `all_star_tower_rater`.
- Import `all_star_tower_rater.sql`.

7. Edit the `pdo.php` file in `assets/php_sup/` so it contains:

```php
$pdo = new PDO(
    "mysql:host=localhost;dbname=all_star_tower_rater;charset=utf8",
    "root",
    ""
);
```

## Known Issues
Graph max values are not defined correctly.

Some chart values may go below 0 or above 100.

## Contact
Discord: youuuma
