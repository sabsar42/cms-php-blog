# ABSCMS System

GitHub: https://github.com/sabsar42/cms-php-blog

This is a Content Management System (CMS) developed using PHP and MySQL. The system includes various functionalities such as user authentication, content management, and a contact form.. Etc. Below is a detailed description of the features included in this system.

## Features

### Navbar

- **Navbar** (`navbar.php`): Provides navigation links to different sections of the CMS like
- Home
- Achievements
- Projects
- More
  - Public Profiles
  - Resume
  - Send a Message

### User Authentication

- **Signup** (`signup.php`): Allows new users to create an account with Hash Password (md5 hash) & RegEx Validation for security.
- **Login** (`login.php`): Allows users to log in to the system.
- **Session Management**: Manages user sessions to keep users logged in across different pages.

### Content Management (Home)

- **Create Post** (`create.php`): Allows users to create new posts.
- **View Posts**: (`index.php`): Displays all the posts created by users.
- **Update Post** (`update.php`): Allows users to edit existing posts.
- **Delete Post** (`delete.php`): Allows users to delete posts.
- **Upload Files** (`upload.php` and `upload_project.php`): Allows users to upload files and projects.

### Achievements

- **Upload Acheivement's Image** (`upload.php`): Allows users to upload their acheivements with Image and Information(Title, Description)
- **View Achievements**(`achievements.php`): Displays user achievements with Image and Information.

### Projects

- **Upload Projects Links** (`upload_project.php`): Allows users to upload their projects with Links such as (GitHub, Youtube)
- **View Projects** (`upload_project.php`): Allows users to view their projects with Links as Preview.

### Public Profiles

- **Contact Me** (`contact_me.php`): This includes profile link buttons for various platforms like StopStalk, GitHub, Codeforces, LinkedIn, and Facebook of users to reach out to them.

### Resume

- **Download Resume** (`download_resume.php`): Allows users to download their resume in `PDF` format.
- **View Resume** (`view_resume.php`): Displays the user's resume embeded in the page. ( Resume Must be Uploded in the Database/Backedn by the Admin )

### Send a Message

- **Anonymous Messages** (`anonymous_message.php`): Allows users to send anonymous messages to the `ADMIN` that has Google Form embeded with it.

### Database

- **Database Configuration** (`db.php`): Contains the database connection settings.

### Other Features

- **CSS**: Custom styles for enhancing the appearance of the CMS.
- **JavaScript**: Custom scripts for RegEx Validation.
- **Uploads & Images Directory**: A directory for storing uploaded files and images.

## File Structure

- `css/`: Directory containing CSS files.
- `images/`: Directory containing image files.
- `js/`: Directory containing JavaScript files.
- `uploads/`: Directory for storing uploaded files.
- `achievements.php`: Page for displaying achievements.
- `anonymous_message.php`: Page for sending anonymous messages.
- `contact_me.php`: Contact form page.
- `create.php`: Page for creating new posts.
- `db.php`: Database configuration file.
- `delete.php`: Page for deleting posts.
- `download_resume.php`: Page for downloading resume.
- `index.php`: Main index page.
- `login.php`: Login page.
- `navbar.php`: Navbar component.
- `signup.php`: Signup page.
- `update.php`: Page for updating posts.
- `upload.php`: Page for uploading files.
- `upload_project.php`: Page for uploading projects.
- `view_resume.php`: Page for viewing resume.

## Getting Started

### Prerequisites

- PHP
- MySQL
- Web Server (e.g., Apache, Nginx)

### Installation

1. Clone the repository to your local machine.
2. Import the database schema from `db.php`.
3. Configure your database connection settings in `db.php`.
4. Start your web server and navigate to the project directory.

### Usage

1. Open the signup page (`signup.php`) to create a new account.
2. Log in using the login page (`login.php`).
3. Use the navbar to navigate through different sections of the CMS.
4. Create, update, and delete posts as needed.
5. Upload files and manage your achievements and resume.

## License

This project is licensed under the ABSAR License.

## Author

Developed by Shakib Absar
