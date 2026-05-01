
# IslandTour

Short, self-contained demo site for managing activities, packages, gallery, food, and contact data using simple PHP endpoints and JSON files. Designed as a lightweight classroom project that can be deployed locally with WAMP/XAMPP.

## Features
- Static front-end pages: `index.html`, `packages.html`, `gallery.html`, `activities.html`, `foodanddining.html`, `contact.html`.
- Simple PHP backend endpoints in `/backend` that serve and update JSON data.
- JSON data stored in `/jsons` for easy inspection and editing.

## Requirements
- Windows (tested with WAMP)
- PHP 7.4+ (bundled with WAMP/XAMPP)
- A modern web browser

## Quick Setup
1. Place this project inside your web server root (for WAMP: `c:/wamp64/www/`).
2. Start WAMP/XAMPP and ensure Apache + PHP are running.
3. Open the site in your browser: `http://localhost/Class-Task_03/` and navigate the pages.

## Backend endpoints
The backend folder contains simple PHP endpoints that read/write JSON files:
- `backend/activity.php`
- `backend/contact.php`
- `backend/food.php`
- `backend/gallery.php`
- `backend/packages.php`
- `backend/reviews.php`

Each endpoint reads/writes the corresponding JSON file in `/jsons` (for example, `jsons/data.json`, `jsons/packages.json`, etc.). Use these for local experiments or to prototype small API interactions.

## Development notes
- This project is intentionally simple and file-based (no DB). For production-grade use, migrate storage to a database and add input validation, authentication, and error handling.
- Keep backups of the `/jsons` folder before bulk edits.

## License
MIT — feel free to adapt for learning and classroom demos.

## Contact
For questions, open an issue or edit README with your notes.

---
**Note:** All jQuery implementations are clearly commented in the source code with example annotations.


