@extends('layouts.app')

@section('content')
<div class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">Empowering Farmers with Smart Agriculture Solutions</h1>
        <p class="hero-subtitle">Access real-time crop insights, weather forecasts, and expert recommendations to maximize your farm's potential</p>
        <div class="hero-buttons">
            <a href="{{ route('crops.index') }}" class="btn btn-primary">
                <i class="fas fa-seedling"></i> Explore Crop Database
            </a>
            <a href="{{ route('admin.crops.create') }}" class="btn btn-secondary">
                <i class="fas fa-plus-circle"></i> Contribute Crop Data
            </a>
        </div>
        <div class="hero-stats">
            <div class="stat-item">
                <span class="stat-number">500+</span>
                <span class="stat-label">Crop Varieties</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">10K+</span>
                <span class="stat-label">Farmers Served</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">24/7</span>
                <span class="stat-label">Expert Support</span>
            </div>
        </div>
    </div>
    <div class="hero-image">
        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80" alt="Happy farmer in field">
        <div class="image-overlay"></div>
    </div>
</div>

<div class="features-section">
    <h2 class="section-title">Comprehensive Farming Solutions</h2>
    <p class="section-subtitle">Our platform provides everything you need to make informed agricultural decisions</p>

    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-cloud-sun"></i>
            </div>
            <h3>Precision Weather Forecasting</h3>
            <p>Get hyper-local 7-day weather forecasts with agricultural impact analysis and planting recommendations tailored to your exact location.</p>
            <div class="feature-image">
                <img src="https://images.unsplash.com/photo-1561484930-974554019ade?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Weather monitoring">
            </div>
            <a href="{{ route('weather.index') }}" class="btn btn-primary">
                <i class="fas fa-cloud-sun"></i> View Weather
            </a>
        </div>

        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-bug"></i>
            </div>
            <h3>Integrated Pest Management</h3>
            <p>Receive real-time pest alerts with organic and chemical treatment options, plus preventive measures for common crop diseases.</p>
            <div class="feature-image">
                <img src="https://images.unsplash.com/photo-1587049352851-8d4e89133924?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Pest inspection">
            </div>
            <a href="{{ route('pest-alerts.index') }}" class="btn btn-primary">
                <i class="fas fa-bug"></i> View Alerts
            </a>
        </div>

        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-lightbulb"></i>
            </div>
            <h3>Smart Crop Selection</h3>
            <p>Our AI-powered system recommends optimal crops based on soil health, climate patterns, water availability, and market demand.</p>
            <div class="feature-image">
                <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Crop selection">
            </div>
            <a href="{{ route('crop-suggestions.index') }}" class="btn btn-primary">
                <i class="fas fa-lightbulb"></i> Get Suggestions
            </a>
        </div>
    </div>
</div>

<div class="testimonials-section">
    <h2 class="section-title">What Farmers Say About Us</h2>
    <div class="testimonials-container">
        <div class="testimonial-card">
            <div class="testimonial-content">
                <p>"This platform helped me increase my rice yield by 30% through better planting timing and pest management advice."</p>
            </div>
            <div class="testimonial-author">
                <img src="https://images.unsplash.com/photo-1564564321837-a57b7070ac4f?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Rajesh Kumar">
                <div>
                    <h4>Rajesh Kumar</h4>
                    <span>Rice Farmer, Punjab</span>
                </div>
            </div>
        </div>

        <div class="testimonial-card">
            <div class="testimonial-content">
                <p>"The weather alerts saved my strawberry crop from unexpected frost damage. Highly recommended!"</p>
            </div>
            <div class="testimonial-author">
                <img src="https://images.unsplash.com/photo-1554151228-14d9def656e4?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Priya Sharma">
                <div>
                    <h4>Priya Sharma</h4>
                    <span>Fruit Grower, Himachal</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="cta-section">
    <div class="cta-content">
        <h2>Ready to Transform Your Farming Practice?</h2>
        <p>Access our comprehensive tools to make better farming decisions today</p>
        <div class="cta-buttons">
            <a href="{{ route('weather.index') }}" class="btn btn-primary btn-large">
                <i class="fas fa-cloud-sun"></i> Weather Forecast
            </a>
            <a href="{{ route('pest-alerts.index') }}" class="btn btn-secondary btn-large">
                <i class="fas fa-bug"></i> Pest Alerts
            </a>
        </div>
    </div>
</div>

<style>
    :root {
        --primary-color: #4CAF50;
        --primary-dark: #388E3C;
        --primary-light: #C8E6C9;
        --dark-text: #333;
        --light-text: #f8f9fa;
        --transition: all 0.3s ease;
        --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Hero Section */
    .hero-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 3rem;
        padding: 5rem 0;
        margin-bottom: 3rem;
        position: relative;
    }

    .hero-content {
        flex: 1;
        max-width: 600px;
        z-index: 2;
    }

    .hero-image {
        flex: 1;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        position: relative;
        height: 500px;
    }

    .hero-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, rgba(255,255,255,0.2), rgba(76,175,80,0.1));
    }

    .hero-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }

    .hero-subtitle {
        font-size: 1.3rem;
        color: var(--dark-text);
        margin-bottom: 2.5rem;
        line-height: 1.6;
    }

    .hero-buttons {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
        margin-bottom: 3rem;
    }

    .hero-stats {
        display: flex;
        gap: 2rem;
        margin-top: 2rem;
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        display: block;
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary-dark);
    }

    .stat-label {
        font-size: 0.9rem;
        color: var(--dark-text);
        opacity: 0.8;
    }

    /* Buttons */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.7rem;
        padding: 1rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: var(--transition);
        border: none;
        cursor: pointer;
        font-size: 1rem;
    }

    .btn-large {
        padding: 1.2rem 2.5rem;
        font-size: 1.1rem;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: white;
        box-shadow: 0 4px 6px rgba(76, 175, 80, 0.3);
    }

    .btn-primary:hover {
        background-color: var(--primary-dark);
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(46, 125, 50, 0.4);
    }

    .btn-secondary {
        background-color: white;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
    }

    .btn-secondary:hover {
        background-color: var(--primary-light);
        color: var(--primary-dark);
        transform: translateY(-3px);
        border-color: var(--primary-dark);
    }

    /* Features Section */
    .features-section {
        padding: 6rem 0;
        background-color: rgba(129, 199, 132, 0.05);
        margin: 4rem 0;
    }

    .section-title {
        text-align: center;
        font-size: 2.3rem;
        color: var(--primary-dark);
        margin-bottom: 1rem;
    }

    .section-subtitle {
        text-align: center;
        font-size: 1.2rem;
        color: var(--dark-text);
        opacity: 0.8;
        margin-bottom: 4rem;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 3rem;
        padding: 0 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .feature-card {
        background: white;
        padding: 2.5rem;
        border-radius: 12px;
        box-shadow: var(--shadow);
        transition: var(--transition);
        display: flex;
        flex-direction: column;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .feature-icon {
        font-size: 3rem;
        color: var(--primary-color);
        margin-bottom: 1.5rem;
    }

    .feature-card h3 {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        color: var(--primary-dark);
    }

    .feature-card p {
        color: var(--dark-text);
        margin-bottom: 2rem;
        line-height: 1.7;
        flex-grow: 1;
    }

    .feature-image {
        height: 200px;
        border-radius: 8px;
        overflow: hidden;
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .feature-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .feature-card:hover .feature-image img {
        transform: scale(1.05);
    }

    /* Testimonials Section */
    .testimonials-section {
        padding: 6rem 0;
        background-color: white;
    }

    .testimonials-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .testimonial-card {
        background: #f8f9fa;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .testimonial-content {
        font-style: italic;
        font-size: 1.1rem;
        line-height: 1.7;
        color: var(--dark-text);
        margin-bottom: 1.5rem;
        position: relative;
    }

    .testimonial-content::before {
        content: '"';
        font-size: 4rem;
        color: var(--primary-light);
        position: absolute;
        top: -1.5rem;
        left: -1rem;
        line-height: 1;
        z-index: 0;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .testimonial-author img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--primary-light);
    }

    .testimonial-author h4 {
        margin: 0;
        color: var(--primary-dark);
    }

    .testimonial-author span {
        font-size: 0.9rem;
        color: var(--dark-text);
        opacity: 0.8;
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        padding: 5rem 2rem;
        text-align: center;
        color: white;
        border-radius: 15px;
        margin: 4rem auto;
        max-width: 1200px;
    }

    .cta-content {
        max-width: 700px;
        margin: 0 auto;
    }

    .cta-section h2 {
        font-size: 2.2rem;
        margin-bottom: 1.5rem;
    }

    .cta-section p {
        font-size: 1.2rem;
        margin-bottom: 2.5rem;
        opacity: 0.9;
    }

    .cta-buttons {
        display: flex;
        gap: 1.5rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .hero-title {
            font-size: 2.4rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
        }

        .features-grid {
            grid-template-columns: 1fr;
            max-width: 600px;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            flex-direction: column;
            text-align: center;
            padding: 3rem 0;
        }

        .hero-image {
            width: 100%;
            height: 400px;
            order: -1;
            margin-bottom: 2rem;
        }

        .hero-buttons {
            justify-content: center;
        }

        .hero-stats {
            justify-content: center;
        }

        .section-title {
            font-size: 2rem;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }
    }

    @media (max-width: 480px) {
        .hero-title {
            font-size: 2rem;
        }

        .hero-buttons {
            flex-direction: column;
            gap: 1rem;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }

        .hero-stats {
            flex-direction: column;
            gap: 1.5rem;
        }

        .feature-card {
            padding: 1.5rem;
        }
    }
</style>
@endsection