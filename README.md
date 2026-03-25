# IslandTour - Class Task 03

This project is made for **ETF - 2026 Year 1 Semester 2**.

- **Topic:** Bootstrap Website

## Project Overview

IslandTour is a multi-page responsive tourism website built with **Bootstrap 5**.  
The website theme is island travel, including packages, food, activities, gallery, and booking/contact details.

Main goal of this project is to show practical Bootstrap component usage in a real website layout.

## Pages Included

- `index.html` - Home page with hero section, carousel, testimonials, and quick navigation to other pages.
- `packages.html` - Package cards and a comparison table for Starter, Standard, Premium, and Ultra Luxury plans.
- `foodanddining.html` - Food, drinks, and dining experience cards in responsive grid layout.
- `gallery.html` - Filterable gallery (All, Beaches, Villas, Activities) with modal image preview.
- `activities.html` - Activity cards, carousel section, and activity comparison table.
- `contact.html` - Booking form, contact details, social links, and embedded Google Map.

## Bootstrap Implementation in This Project

### 1. Navbar
- Responsive navbar is used on all pages with collapse/toggler support.
- Navigation links connect Home, Packages, Food, Gallery, Activities, and Contact pages.

### 2. Button Styles
- Used multiple button styles across pages:
	- `btn-success`
	- `btn-outline-primary`
	- `btn-outline-light`
	- `btn-outline-success`
	- Rounded styles like `rounded-pill`

### 3. Table Styles
- Tables are used in `packages.html` and `activities.html`.
- Implemented styles include:
	- `table-striped`
	- `table-bordered`
	- `table-hover`
	- `table-dark` (header)

### 4. Image Handling
- Image-related Bootstrap classes used in different pages:
	- `img-fluid`
	- `card-img-top`
	- `rounded-circle`
	- `w-100` / responsive image sizing in carousel and cards

### 5. Grid System
- Responsive layout built using Bootstrap grid classes such as:
	- `container`, `container-fluid`
	- `row`, `col-*`
	- `col-sm-6`, `col-md-3`, `col-lg-3`, `col-lg-7`, `col-lg-5`
- Layout adjusts for mobile, tablet, and desktop screens.

## Other Features

- Bootstrap Carousel in home and activities pages.
- Bootstrap Cards for packages, activities, and food sections.
- Bootstrap Modal used in gallery image preview.
- Bootstrap Icons used in contact and activities pages.
- Small JavaScript features:
	- Gallery filtering and modal image preview.
	- Booking form submission message in contact page.

## Tech Stack

- HTML5
- CSS3
- Bootstrap 5 (CDN)
- Bootstrap Icons (CDN)
- Vanilla JavaScript

## Project Structure

```
Class-Task_03/
|- index.html
|- packages.html
|- foodanddining.html
|- gallery.html
|- activities.html
|- contact.html
|- README.md
|- assests/
```

## How To Run

1. Download or clone the project.
2. Open the project folder.
3. Open `index.html` in a web browser.

No build tools or package installation are required.


