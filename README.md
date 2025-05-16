# AI-Powered CV Analyzer with Laravel and Cohere

A web application built with Laravel that allows users to upload their CV (PDF or DOCX), compare it against a job description, and get personalized insights and a custom cover letter using Cohere AI.

## ✨ Features

- Upload a CV in PDF or DOCX format
- Input a job description
- Get:
  - Compatibility score (0–100)
  - 3 strengths and 3 weaknesses
  - A personalized cover letter
- Clean UI with Bootstrap 5
- CV parsing with PDFParser and PHPWord
- AI generation using Cohere Command R+

## 🧠 Tech Stack

| Layer            | Technology                        |
|------------------|-----------------------------------|
| Backend          | Laravel 11                        |
| Frontend         | Blade + Bootstrap 5               |
| AI Integration   | [Cohere](https://cohere.ai/) API  |
| PDF Parsing      | `smalot/pdfparser`                |
| DOCX Parsing     | `phpoffice/phpword`               |
| HTTP Client      | Guzzle                            |
| Testing          | PHPUnit                           |
| Build Tool       | Vite (via `npm run dev`)          |

## 🚀 Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/yourusername/cv-analyzer.git
cd cv-analyzer
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Setup `.env`

Copy `.env.example` and update:

```bash
cp .env.example .env
php artisan key:generate
```

Set your Cohere API key:

```env
COHERE_API_KEY=your-cohere-key
```

### 4. Compile assets with Bootstrap (via Vite)

```bash
npm run dev
```

Leave this running in a separate terminal tab during development.

### 5. Serve the application

```bash
php artisan serve
```

Then open [http://localhost:8000](http://localhost:8000)

## 🧪 Running Tests

```bash
php artisan test
```

Or with PHPUnit directly:

```bash
vendor/bin/phpunit
```

### Tests Included:

- `Unit\CohereCvServiceTest`
- `Unit\CvParserServiceTest`
- `Feature\CvAnalyzerControllerTest`

## 🔒 Security

If you discover any security-related issues, please create a private GitHub issue or contact me directly.

## 🧑‍💻 Author

**Aram Kechichian**  
[LinkedIn](https://www.linkedin.com/in/aramkechichian/)  
[GitHub](https://github.com/yourusername)

## 📄 License

MIT License. Feel free to fork and improve!
