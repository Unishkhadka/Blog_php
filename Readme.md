# Blog Management System

Welcome to the Blog Management System repository! This system is designed to help you manage your blogs with ease. Whether you're a blogger, developer, or enthusiast, this PHP-based web application provides a solid foundation for creating, categorizing, and sharing your thoughts.

## Features
- **User Authentication:** Register and sign in to manage your blogs securely.
- **Create Blogs:** Share your thoughts by creating new blog posts with titles, content, and images.
- **Categorize Blogs:** Assign categories to your blogs for easy organization and navigation.
- **Comments:** Engage with your readers through a commenting system for each blog post.
- **User Profiles:** Maintain a personalized user profile with essential information.

## Requirements

To run this application, you need:

- **PHP:** Ensure that you have PHP installed on your server or local environment.
- **Web Server:** You can use Apache, Nginx, or any other web server of your choice.
- **Database:** This application uses a relational database. MySQL or similar is recommended.

## Installation

1. Clone the repository to your local machine:

    ```bash
    git clone https://github.com/YourUsername/Blog_php.git
    ```

2. Move into the project directory:

    ```bash
    cd Blog_php
    ```

3. **Database Setup:**

   - **Create a Database:**
     - Open your preferred database management tool (e.g., MySQL, phpMyAdmin).
     - Create a new database and name it `blog`.

   - **Create Tables:**
     - Run the SQL queries below to create the necessary tables:

       ```sql
       -- User Table
       CREATE TABLE users (
           user_id INT AUTO_INCREMENT PRIMARY KEY,
           fullname VARCHAR(255),
           email VARCHAR(255),
           password VARCHAR(255),
           profile_image VARCHAR(255),
           address VARCHAR(255),
           created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
           updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
       );

       -- Categories Table
       CREATE TABLE categories (
           category_id INT AUTO_INCREMENT PRIMARY KEY,
           category VARCHAR(255)
       );

       -- Blogs Table
       CREATE TABLE blogs (
           blog_id INT AUTO_INCREMENT PRIMARY KEY,
           title VARCHAR(255),
           content TEXT,
           category_id INT,
           created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
           updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
           image_url VARCHAR(255),
           user_id INT,
           description TEXT,
           FOREIGN KEY (category_id) REFERENCES categories(category_id),
           FOREIGN KEY (user_id) REFERENCES users(user_id)
       );

       -- Comments Table
       CREATE TABLE comments (
           comment_id INT AUTO_INCREMENT PRIMARY KEY,
           content TEXT,
           created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
           blog_id INT,
           user_id INT,
           FOREIGN KEY (blog_id) REFERENCES blogs(blog_id),
           FOREIGN KEY (user_id) REFERENCES users(user_id)
       );
       ```

4. Start your preferred web server, ensuring that it has PHP support.

5. Open the application in your web browser. If you're running it locally, the URL might be something like `http://localhost/Blog_php`.

## Usage

1. Register and sign in to create your account.
2. Log in with your credentials.
3. Create new blogs with titles, content, and images.
4. Assign categories to your blogs for better organization.
5. Engage with your readers through the comment section on each blog post.

## Contributing

If you'd like to contribute to this project, please follow these steps:

1. Fork the repository.
2. Create a new branch.
3. Make your changes and commit them.
4. Push to the branch.
5. Submit a pull request.

## Acknowledgments

Feel free to explore, modify, and enhance the Blog Management System to suit your needs. If you encounter any issues or have suggestions for improvement, don't hesitate to open an issue or submit a pull request. Happy blogging!
