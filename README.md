# IslandTour - Class Task 03 & 04

This project is made for **ETF - 2026 Year 1 Semester 2**.

- **Task 03:** Bootstrap Website
- **Task 04:** jQuery Web Application with DOM Manipulation

## Project Overview

IslandTour is a multi-page responsive tourism website built with **Bootstrap 5** and enhanced with **jQuery**.  
The website theme is island travel, including packages, food, activities, gallery, and booking/contact details.

Main goals of this project:
1. Show practical Bootstrap component usage in a real website layout (Task 03)
2. Demonstrate jQuery DOM manipulation, CSS changes, and JavaScript effects (Task 04)

## Pages Included

- `index.html` - Home page with hero section, dark mode toggle, carousel, and testimonials.
- `packages.html` - Package cards with selection functionality and comparison table.
- `foodanddining.html` - Food, drinks, and dining experience cards with availability checks.
- `gallery.html` - Filterable gallery with modal image preview and effects.
- `activities.html` - Activity cards with interactive effects and comparisons.
- `contact.html` - Booking form with form validation and success feedback.

## jQuery Implementation - All 6 Required Features

This project demonstrates all required jQuery features across every page:

### ✅ 1. DOM Traversal
Selecting and navigating through DOM elements:
- `.eq()` - Select element by index (foodanddining.html, gallery.html)
- `.closest()` - Find nearest parent element (packages.html)
- `.find()` - Find child elements (packages.html)
- `.first()` - Select first element (contact.html)
- jQuery selector chaining for nested navigation

**Locations:**
- `packages.html`: Line ~337 - Finding book button text through parent card
- `foodanddining.html`: Lines ~267-340 - Using .eq() to select specific cards
- `gallery.html`: Line ~352 - Selecting gallery items by index

### ✅ 2. DOM Modification
Changing HTML content and structure:
- `.html()` - Set HTML content
- `.text()` - Set text content
- `.append()` - Add elements
- `.prepend()` - Add elements at start
- `.remove()` - Delete elements

**Locations:**
- `packages.html`: Line ~315 - Updating display text for package selection
- `foodanddining.html`: Lines ~267-320 - Changing card titles dynamically
- `contact.html`: Line ~326 - Showing success message HTML
- `activities.html`: Line ~405 - Adding status alert boxes

### ✅ 3. DOM Attribute Modification
Changing element attributes:
- `.attr()` - Get/set attributes
- `.addClass()` - Add CSS classes
- `.removeClass()` - Remove CSS classes
- `.toggleClass()` - Toggle CSS classes

**Locations:**
- `packages.html`: Line ~328 - Disabling buttons via .attr("disabled")
- `foodanddining.html`: Lines ~323-329 - Changing image sources with .attr()
- `contact.html`: Line ~317 - Removing "d-none" class to show element
- `index.html`: Lines ~118-120 - Using toggleClass for dark mode

### ✅ 4. CSS Manipulation (Colors & Styles)
Changing CSS properties dynamically:
- `.css()` - Set inline CSS styles
- Color changes for interactive feedback
- Background color modifications
- Font-weight and border-color changes

**Locations:**
- `packages.html`: Lines ~310-334 - Style button with colors/fonts based on selection
- `foodanddining.html`: Lines ~260-265 - Changing card and body background colors
- `contact.html`: Line ~328 - Changing background color on form submission
- `gallery.html`: Lines ~362-369 - CSS color changes for interactive elements
- `index.html`: Lines ~130-144 - Extensive CSS changes for dark theme

### ✅ 5. JavaScript Effects
Animations and visual effects:
- `.fadeIn()` - Fade in animation
- `.fadeOut()` - Fade out animation
- `.fadeToggle()` - Toggle fade effect
- `.fadeTo()` - Fade to specific opacity
- `.hide()` / `.show()` - Instant visibility toggle
- `.delay()` - Delay animations
- `.stop()` - Stop animations

**Locations:**
- `packages.html`: Line ~325 - FadeIn effect for checkout section
- `foodanddining.html`: Lines ~336-340 - FadeOut effect for removing items
- `contact.html`: Lines ~317, ~322 - FadeIn/FadeOut for success/error messages
- `gallery.html`: Line ~365 - FadeToggle for interactive elements
- `index.html`: Line ~145-151 - Multiple fade effects
- `activities.html`: Lines ~407-414 - FadeTo with opacity changes

### ✅ 6. HTML Events
Responding to user interactions:
- `.click()` - On element click
- `.mouseover()` / `.mouseenter()` - On mouse hover start
- `.mouseleave()` - On mouse hover end
- `.hover()` - Combined hover handler
- `.submit()` - On form submission
- `.on()` - Generic event binding

**Locations:**
- `packages.html`: Line ~307 - .click() event on book buttons
- `foodanddining.html`: Lines ~258, ~266, ~322, ~335, ~343 - Multiple .click() events
- `contact.html`: Line ~313 - .submit() event on form
- `gallery.html`: Line ~352 - .click() on gallery cards
- `index.html`: Lines ~114, ~149, ~161 - Various events for dark mode toggle
- `activities.html`: Lines ~391-394 - .on('click') with event binding

## Bootstrap Implementation in This Project

### 1. Navbar
- Responsive navbar is used on all pages with collapse/toggler support.
- Navigation links connect Home, Packages, Food, Gallery, Activities, and Contact pages.
- Glass-morph effect with backdrop blur on scrolling navigation.

### 2. Button Styles
- Used multiple button styles across pages:
	- `btn-success`, `btn-primary`, `btn-warning`, `btn-danger`, `btn-info`
	- `btn-outline-primary`, `btn-outline-light`, `btn-outline-success`, `btn-outline-dark`
	- Rounded styles like `rounded-pill`, `rounded-3`

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

### 6. Cards & Modals
- Bootstrap Cards for packages, activities, and food sections
- Bootstrap Modal used in gallery image preview
- Card transitions and hover effects

## Tech Stack

- HTML5
- CSS3
- Bootstrap 5 (CDN)
- Bootstrap Icons (CDN)
- **jQuery 3.6.0+ (CDN)** - For DOM manipulation and effects
- Vanilla JavaScript (selective use)

## Project Structure

```
Class-Task_03/
|- index.html              (Dark mode toggle, multiple effects)
|- packages.html           (Package selection with visual feedback)
|- foodanddining.html      (Availability checks, image updates)
|- gallery.html            (Filtering, hover effects, modal)
|- activities.html         (Card interactions, text changes)
|- contact.html            (Form submission feedback)
|- README.md
|- assests/
```

## How To Run

1. Download or clone the project.
2. Open the project folder.
3. Open `index.html` in a web browser.

No build tools or package installation are required.

## jQuery Usage Summary

| Feature | Example | Pages |
|---------|---------|-------|
| **DOM Traversal** | `.closest()`, `.find()`, `.eq()` | All pages |
| **DOM Modification** | `.html()`, `.text()`, `.append()` | All pages |
| **Attribute Mod** | `.attr()`, `.addClass()`, `.removeClass()` | All pages |
| **CSS Manipulation** | `.css({property: value})`, color changes | All pages |
| **Effects** | `.fadeIn()`, `.fadeOut()`, `.fadeTo()`, `.fadeToggle()` | All pages |
| **Events** | `.click()`, `.hover()`, `.submit()`, `.on()` | All pages |

---
**Note:** All jQuery implementations are clearly commented in the source code with example annotations.


