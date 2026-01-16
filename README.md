# Mykaeltech Website

A modern, fully-featured company website built with plain PHP and TailwindCSS - no frameworks required!

## About

Mykaeltech specializes in integrated solutions that bridge technology and accounting, providing transformative services from modern cloud infrastructure to precise financial modeling.

## Features

### Core Pages
- **Homepage** - Animated hero section, company highlights, CEO profile, stats counter, testimonials, and technology showcase
- **Services** - All 7 services with animated cards, pricing, "Request Quote" modals, process timeline, and FAQ accordion
- **Portfolio** - GitHub repositories showcase with filterable cards by tech stack (easy to update manually or integrate with GitHub API)
- **Team** - CEO profile with expandable team member cards, skills, social links, and company values
- **Contact** - Stylish contact form with PHP mail(), business hours, FAQ section, and social links

### Authentication System
- **Register** - User registration with validation and file-based storage
- **Login** - Secure authentication with session management
- **Dashboard** - Interactive user dashboard with profile widgets and quick actions
- **Logout** - Clean session termination

### Design & UX
- ✨ Modern, animated UI with TailwindCSS
- 📱 Fully responsive (mobile-friendly)
- ♿ Accessibility best practices
- 🎨 Custom animations (slide, fade, bounce, pulse, spin)
- 🎯 Smooth scrolling and scroll-triggered animations
- 🔄 Interactive modals, accordions, and filters
- 📊 Animated stats counters
- 🎭 Beautiful gradient backgrounds

### Technical Features
- 🔐 File-based user authentication (no database required, easily upgradable)
- 📧 Contact form with PHP mail() integration
- 🛡️ CSRF protection
- 🔒 Input sanitization and validation
- 📂 Clean, modular code structure
- 💬 Comprehensive inline comments
- 🎨 TailwindCSS via CDN
- ⚡ Optimized JavaScript for interactions
- 🚫 Custom 404 error page

## Requirements

- **PHP** >= 7.4 (8.0+ recommended)
- **Web Server** (Apache with mod_rewrite or Nginx)
- **Optional**: Mail server configuration for contact form functionality

No database, no dependencies, no build process required!

## Installation

### Quick Setup (3 steps)

1. **Clone or download the repository:**
```bash
git clone https://github.com/mykael2000/mykaeltech_site.git
cd mykaeltech_site
```

2. **Set permissions for data directories:**
```bash
chmod -R 700 data/
```

3. **Configure your web server:**
   - Point document root to the repository root directory
   - Ensure `.htaccess` is enabled (for Apache)
   - Access via browser: `http://localhost` or your domain

That's it! The site is ready to use.

## Web Server Configuration

### Apache
The included `.htaccess` file handles:
- Custom 404 error page
- Security headers
- Directory protection
- Browser caching
- Compression

Ensure `mod_rewrite` is enabled:
```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
```

### Nginx
Add this to your nginx configuration:
```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/mykaeltech_site;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    error_page 404 /404.php;
}
```

## Project Structure

```
mykaeltech_site/
├── index.php              # Homepage
├── services.php           # Services page
├── portfolio.php          # Portfolio page
├── team.php              # Team page
├── contact.php           # Contact page
├── register.php          # User registration
├── login.php             # User login
├── dashboard.php         # User dashboard (protected)
├── logout.php            # Logout handler
├── 404.php               # Custom error page
├── .htaccess             # Apache configuration
├── includes/
│   ├── config.php        # Site configuration & constants
│   ├── header/
│   │   └── header.php    # Site header & navigation
│   ├── footer/
│   │   └── footer.php    # Site footer
│   └── auth/
│       └── functions.php # Authentication functions
├── assets/
│   ├── css/
│   │   └── style.css     # Custom CSS styles
│   ├── js/
│   │   └── main.js       # JavaScript for interactions
│   ├── images/           # Image files
│   └── icons/            # Icon files
├── data/
│   ├── users/            # User data (JSON files)
│   └── sessions/         # Session data
└── public/
    └── logo.png          # Company logo
```

## Configuration

Edit `includes/config.php` to customize:

- Site name, title, URLs
- Contact information (email, phone, address)
- CEO information
- Services list
- Technologies
- Testimonials
- Stats counters

Example:
```php
define('SITE_NAME', 'Your Company');
define('SITE_EMAIL', 'your@email.com');
define('CEO_NAME', 'Your Name');
```

## Customization Guide

### Adding Services
Edit `includes/config.php` and add to the `$GLOBALS['services']` array:
```php
[
    'name' => 'Your Service',
    'icon' => '🎯',
    'description' => 'Service description',
    'features' => ['Feature 1', 'Feature 2'],
    'starting_price' => '$1,000',
]
```

### Adding Portfolio Projects
Edit `portfolio.php` and add to the `$projects` array:
```php
[
    'name' => 'Project Name',
    'description' => 'Project description',
    'tech_stack' => ['PHP', 'React'],
    'category' => 'web',
    'github_url' => 'https://github.com/...',
    'demo_url' => 'https://...',
    'image' => '/path/to/image.png',
    'stars' => 10,
    'forks' => 5,
]
```

### Adding Team Members
Edit `team.php` and add to the `$teamMembers` array:
```php
[
    'name' => 'Team Member',
    'role' => 'Developer',
    'bio' => 'Bio text...',
    'email' => 'email@company.com',
    'github' => 'https://github.com/...',
    'linkedin' => 'https://linkedin.com/in/...',
    'image_placeholder' => 'TM',
    'skills' => ['Skill 1', 'Skill 2'],
    'is_ceo' => false,
]
```

## Email Configuration

The contact form uses PHP's `mail()` function. For production:

1. **Shared Hosting**: Usually works out of the box
2. **VPS/Dedicated**: Install and configure a mail server (Postfix, SendMail)
3. **Alternative**: Integrate with services like SendGrid, Mailgun, or AWS SES

Edit `contact.php` to customize email handling.

## Security Notes

- User passwords are hashed using PHP's `password_hash()` (bcrypt)
- CSRF tokens protect forms from cross-site request forgery
- Input sanitization prevents XSS attacks
- `.htaccess` protects sensitive directories
- Session management follows PHP best practices

For production:
- Enable HTTPS (uncomment redirect in `.htaccess`)
- Review and adjust security headers
- Set appropriate file permissions (644 for files, 755 for directories)
- Regularly update PHP version

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance

- TailwindCSS loaded via CDN with caching
- Optimized images
- Browser caching enabled
- Gzip compression enabled
- Minimal JavaScript (vanilla JS, no heavy frameworks)

## Upgrading

### To Add a Database
1. Install MySQL/PostgreSQL
2. Update `includes/auth/functions.php` to use database queries
3. Modify user storage from files to database tables
4. Keep the same interface - minimal code changes needed!

### To Integrate GitHub API
In `portfolio.php`, replace the `$projects` array with a GitHub API fetch:
```php
$projects = fetchGitHubRepos('username'); // Implement this function
```

## Troubleshooting

**Contact form not sending emails?**
- Check PHP mail configuration: `php -i | grep mail`
- Check server mail logs
- Try a third-party email service

**Authentication not working?**
- Verify data directory permissions (755)
- Check PHP session configuration
- Ensure cookies are enabled

**Animations not working?**
- Check browser console for JavaScript errors
- Verify main.js is loading correctly
- Clear browser cache

**404 page not showing?**
- Verify `.htaccess` is being read
- Enable mod_rewrite in Apache
- Check error logs

## License

Proprietary - All rights reserved by Mykaeltech

## Contact & Support

- **Email**: info@mykaeltech.com
- **Phone**: +1 (555) 987-6543
- **GitHub**: https://github.com/mykael2000
- **LinkedIn**: https://linkedin.com/in/michael-erameh

## Credits

Built with ❤️ using:
- PHP (Plain, no frameworks)
- TailwindCSS (via CDN)
- Font Awesome Icons
- Vanilla JavaScript

---

**Version**: 1.0.0  
**Last Updated**: January 2026  
**Maintained by**: Michael Erameh
