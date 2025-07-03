# Local Events Hub - Huddersfield Community
##Scenario Description

The Local Events Hub is a web based app to handle and display community events around the Huddersfield region. This app is a hub for local organizations, communities and individuals to create, manage and discover events in their neighborhood. The aim of the system is to promote community engagement by offering an intuitive interface for event management and discovery.

The app supports different types of community events such as community garden workdays, art shows, book club meetings, farmers markets, youth sports tournaments, theater productions, historic tours and technology workshops for seniors. This case study was selected as not only does it tackle an actual community requirement, but also is a novelty, not demonstrating one of the usual web application examples.

## Functionality Implemented

### Core CRUD Operations

The app supports full Create Read Update and Delete (CRUD) functionality for events. New community events may be submitted by users complete with title, description, date, time, location, host, size and status. It displays the list (both in order and ahead of time) of events in a organized way, with search and filter options, and it allows you to see the detail of an event. Events already in existence can be edited to alter any information, including the ability to change status of the event and delete existing events from the system, with confirmation messages.

###  Search and Filtering

The app provides a search feature where we can search for events by title, description, location, or organizer name. Importantly, you can filter on status (upcoming, ongoing, completed, and cancelled) and the results will be shown in realtime.

###  Pagination

List of events are paginated automatically, and 10 events per page are good for performance and user read balance. Search and filtering options translate across pagination so there’s no need for a user to continuously refine if they still see they’re in the same context.

###  User Input Validation
It's an app with full user input validation via Laravel, not with HTML attributes). Title, description, date, time, location, organizer, and status are the mandatory fields. events are not created in past, the capacity should reflect affirmative number – no-negativeness, all user input is validated, sanitized correctly. Error messages provide sufficient, specific feedback to users, informing them of how to correct any validation errors.

### Database Design

The application contains a required SQLite events table, correctly normalized up to first normal form, without repeating groups, and with atomic values. The following is the table definition with all the required information of an event on a single populated row in a nice structured format with appropriate data types and constraints maintaining the integrity of data.

### Laravel Framework Features Demonstrated

#### Routes and Controllers

Great sample of the use of laravel resource routing for pretty and clean restful urls. Connection: Model Binding now allows for automatic resolution of models in your controllers rather than injecting the model yourself, form method spoofing supports PUT/PATCH and DELETE requests properly etc.

#### Models and Eloquent

We also see the full power of Laravel’s Eloquent ORM for working with the database. Formatted date/time display & availability calculations are handled via custom getters. The fillable fields resolves the mass assignment protection, and the date casts automatically formats and handles your date. 

#### Views and Blade Templates

As you can see, most of the dyamic data relies on Blade directives. Layouts and sections are employed correctly with template inheritance. Rendering dynamically, according to the status and availability of events. Form handling comes with "best practice" from creation of forms in a secure mannar (CRSF protection) and preserving of old input storage.

#### Database Migrations and Seeders

The migration tool was the correct decision based on our latest work which includes the database schema over the wire, as well as backward migration. SEEDER An implemented seeder provided sample data for testing and demonstration, including automatically inserted community level realistic event data.

### Styling in CSS and User Experience

The app is designed with CSS only to Desktop (1366x768) users. The project includes responsive layout on multiple screen sizes; high contrast for readability and accessibility; persistent navigation with clear user paths; visual feedback through status indicators and action buttons; and professional form design with space and visual hierarchy.

###Installation and Setup Instructions

###  Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL 8.0 or higher
- A web server (Apache/Nginx) or PHP built-in server

### Step 1: Clone the Repository back, Get the latest stable release!
```bash
git clone https://github.com/U2354778/local-events-hub.git
cd local-events-hub
### Step 2: Install Dependencies
```bash
composer install
```

### Step 3: Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

Edit the `.env` file and configure your database settings:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=local_events_db
DB_USERNAME=your_mysql_username
DB_PASSWORD=your_mysql_password
```

### Step 4: Database Setup
Create the MySQL database:
```bash
mysql -u root -p -e "CREATE DATABASE local_events_db;"

Run the migrations to create the database tables:
```bash
php artisan migrate
```

Seed the database with sample data:
```bash
php artisan db:seed
```

### Step 5: Start the Application
```bash
php artisan serve --host=0.0.0.0 --port=8008
```

The application will be available at `http://localhost:8008`

## Technical Implementation

### Database Schema

The `events` table has the following columns: id (Primary Key), title, description, event_date, event_time, location, organizer, capacity, current_attendees, status, created_at and updated_at timestamps.

### File Structure

app/
├── Http/Controllers/EventController. php
├── Models/Event.php
database/
├── migrations/2025_07_02_085729_create_events_table. php
├── seeders/EventSeeder.php
resources/
├── views/
│ ├── layouts/app.blade.php
│ └── events/
│ ├── index.blade.php
│ ├── create.blade.php
│ ├── show.blade.php
│ └── edit.blade.php
routes/
└── web.php
