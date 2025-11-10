# OralAI - Laravel Application

A Laravel-based web application for AI-powered oral cancer detection. This is a design demonstration showcasing modern web development practices with Laravel framework.

## Features

- **AI Detection Interface**: Upload oral images for AI-powered analysis
- **Responsive Design**: Mobile-first approach with modern UI/UX
- **Laravel Backend**: Robust PHP framework with Blade templating
- **Interactive Elements**: Drag & drop file upload, real-time progress tracking
- **Medical-Grade Design**: Professional healthcare aesthetic
- **Accessibility**: WCAG compliant with keyboard navigation support

## Technology Stack

- **Backend**: Laravel 10.x
- **Frontend**: Blade templates, CSS3, JavaScript ES6+
- **Build Tool**: Vite
- **Styling**: Custom CSS with CSS Variables
- **Icons**: Font Awesome 6
- **Fonts**: Inter (Google Fonts)

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd oralai-cancer-detection
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup** (if using database features)
   ```bash
   php artisan migrate
   ```

6. **Build assets**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

7. **Start the development server**
   ```bash
   php artisan serve
   ```

## Project Structure

```
oralai-cancer-detection/
├── app/
│   └── Http/Controllers/
│       └── HomeController.php          # Main controller
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php           # Main layout template
│   │   ├── home.blade.php              # Homepage
│   │   ├── detection.blade.php         # AI detection page
│   │   ├── about.blade.php             # About page
│   │   └── contact.blade.php            # Contact page
│   ├── css/
│   │   └── app.css                      # Main stylesheet
│   └── js/
│       └── app.js                       # Main JavaScript file
├── routes/
│   └── web.php                          # Web routes
├── public/                              # Public assets
├── composer.json                        # PHP dependencies
├── package.json                         # Node.js dependencies
├── vite.config.js                       # Vite configuration
└── README.md                            # This file
```

## Routes

- `GET /` - Homepage
- `GET /detection` - AI Detection Tool
- `GET /about` - About Page
- `GET /contact` - Contact Page
- `POST /contact` - Contact Form Submission
- `POST /newsletter` - Newsletter Subscription
- `POST /analyze` - AI Image Analysis (API)
- `GET /stats` - Statistics API

## Key Features

### AI Detection Interface
- Drag & drop file upload
- Real-time progress tracking
- Simulated AI analysis
- Results display with confidence scores
- Medical recommendations

### Responsive Design
- Mobile-first approach
- Breakpoints: 768px, 480px
- Touch-friendly interactions
- Optimized for all devices

### Accessibility
- WCAG 2.1 AA compliant
- Keyboard navigation support
- Screen reader friendly
- High contrast ratios
- Focus management

### Performance
- Optimized images and assets
- Lazy loading
- Efficient CSS animations
- Minimal JavaScript footprint

## Customization

### Colors
Modify CSS variables in `resources/css/app.css`:
```css
:root {
    --primary-color: #2563eb;
    --secondary-color: #10b981;
    --accent-color: #f59e0b;
    /* ... */
}
```

### Content
Update Blade templates in `resources/views/` directory.

### Styling
Modify `resources/css/app.css` for custom styling.

## Development

### Building Assets
```bash
# Development build with watch
npm run dev

# Production build
npm run build

# Build with watch
npm run watch
```

### Laravel Commands
```bash
# Clear caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Generate optimized autoloader
composer dump-autoload --optimize
```

## Browser Support

- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## License

This project is for demonstration purposes only. Please ensure you have proper licensing for any production use.

## Disclaimer

This is a design demonstration and not a functional medical application. The AI detection features are simulated for design purposes only. Always consult with healthcare professionals for medical advice.

## Support

For questions or support, please contact:
- Email: support@oralai.com
- Documentation: [Link to docs]
- Issues: [GitHub Issues]

---

**Note**: This is a Laravel application designed for demonstration purposes. The AI detection functionality is simulated and should not be used for actual medical diagnosis.
