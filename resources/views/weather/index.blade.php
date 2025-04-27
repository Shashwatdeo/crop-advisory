@extends('layouts.app')

@section('content')
<div class="weather-container">
    
    <div class="weather-header">
        <h1><i class="fas fa-cloud-sun"></i> Weather Intelligence Dashboard</h1>
        <p class="subtitle">Get hyper-local weather data for agricultural planning</p>
    </div>

    <div class="weather-search">
        <form method="GET" action="{{ route('weather.index') }}" class="search-form">
            <div class="search-input-group">
                <i class="fas fa-search"></i>
                <input type="text" name="city" value="{{ $city }}" placeholder="Enter city or location..." required>
                <button type="submit" class="search-button">
                    <i class="fas fa-cloud-showers-heavy"></i> Get Weather
                </button>
            </div>
        </form>
    </div>

    @if(isset($error))
    <div class="weather-error">
        <i class="fas fa-exclamation-circle"></i>
        <p>{{ $error }}</p>
    </div>
    @elseif($weather)
    <div class="weather-card">
        <div class="weather-location">
            <h2><i class="fas fa-map-marker-alt"></i> {{ $city }}</h2>
            <p class="weather-date">{{ now()->format('l, F j, Y') }}</p>
        </div>

        <div class="weather-main">
            <div class="temperature-display">
                <div class="temp-value">{{ round($weather['main']['temp']) }}°C</div>
                <div class="weather-icon">
                    @php
                        $icon = $weather['weather'][0]['icon'];
                        $description = $weather['weather'][0]['description'];
                    @endphp
                    <img src="https://openweathermap.org/img/wn/{{ $icon }}@4x.png" alt="{{ $description }}" title="{{ $description }}">
                    <div class="weather-condition">{{ ucfirst($description) }}</div>
                </div>
            </div>

            <div class="weather-details">
                <div class="detail-item">
                    <i class="fas fa-temperature-high"></i>
                    <div>
                        <span class="detail-label">Feels Like</span>
                        <span class="detail-value">{{ round($weather['main']['feels_like']) }}°C</span>
                    </div>
                </div>
                <div class="detail-item">
                    <i class="fas fa-wind"></i>
                    <div>
                        <span class="detail-label">Wind</span>
                        <span class="detail-value">{{ $weather['wind']['speed'] }} m/s</span>
                    </div>
                </div>
                <div class="detail-item">
                    <i class="fas fa-tint"></i>
                    <div>
                        <span class="detail-label">Humidity</span>
                        <span class="detail-value">{{ $weather['main']['humidity'] }}%</span>
                    </div>
                </div>
                <div class="detail-item">
                    <i class="fas fa-compress-alt"></i>
                    <div>
                        <span class="detail-label">Pressure</span>
                        <span class="detail-value">{{ $weather['main']['pressure'] }} hPa</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="weather-agricultural">
            <h3><i class="fas fa-tractor"></i> Agricultural Advisory</h3>
            <div class="advisory-content">
                @if($weather['weather'][0]['main'] === 'Rain')
                    <p><i class="fas fa-exclamation-triangle"></i> <strong>Rain Advisory:</strong> Postpone field work and irrigation. Good time for soil nutrient absorption.</p>
                @elseif($weather['main']['temp'] > 30)
                    <p><i class="fas fa-sun"></i> <strong>Heat Advisory:</strong> Increase irrigation frequency. Consider shading for sensitive crops.</p>
                @elseif($weather['wind']['speed'] > 5)
                    <p><i class="fas fa-wind"></i> <strong>Wind Advisory:</strong> Secure greenhouses and young plants. Avoid spraying pesticides.</p>
                @else
                    <p><i class="fas fa-thumbs-up"></i> <strong>Favorable Conditions:</strong> Ideal for most farming activities. Proceed with planned operations.</p>
                @endif
            </div>
        </div>
    </div>
    @elseif($city)
    <div class="weather-error">
        <i class="fas fa-exclamation-circle"></i>
        <p>No weather data available for "{{ $city }}". Please check the location name and try again.</p>
    </div>
    @endif
</div>

<style>
    /* Weather Container */
    .weather-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 0 1.5rem;
    }

    /* Header */
    .weather-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .weather-header h1 {
        font-size: 2.2rem;
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
    }

    .weather-header .subtitle {
        color: var(--dark-text);
        opacity: 0.8;
        font-size: 1.1rem;
    }

    /* Search Form */
    .weather-search {
        margin-bottom: 3rem;
    }

    .search-form {
        width: 100%;
    }

    .search-input-group {
        display: flex;
        align-items: center;
        background: white;
        border-radius: 50px;
        padding: 0.5rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid #e0e0e0;
    }

    .search-input-group i {
        color: var(--primary-color);
        margin: 0 1rem;
        font-size: 1.2rem;
    }

    .search-input-group input {
        flex: 1;
        border: none;
        padding: 0.8rem 0;
        font-size: 1rem;
        outline: none;
    }

    .search-button {
        background: var(--primary-color);
        color: white;
        border: none;
        padding: 0.8rem 1.5rem;
        border-radius: 50px;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .search-button:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    /* Weather Card */
    .weather-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .weather-location {
        padding: 1.5rem;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
    }

    .weather-location h2 {
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 1.5rem;
    }

    .weather-date {
        margin: 0.5rem 0 0;
        opacity: 0.9;
        font-size: 0.9rem;
    }

    /* Weather Main */
    .weather-main {
        padding: 2rem;
    }

    .temperature-display {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
    }

    .temp-value {
        font-size: 4rem;
        font-weight: 700;
        color: var(--primary-dark);
    }

    .weather-icon {
        text-align: center;
    }

    .weather-icon img {
        height: 100px;
        width: auto;
    }

    .weather-condition {
        font-size: 1.2rem;
        color: var(--dark-text);
        margin-top: -1rem;
    }

    /* Weather Details */
    .weather-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .detail-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: rgba(129, 199, 132, 0.1);
        border-radius: 10px;
    }

    .detail-item i {
        font-size: 1.5rem;
        color: var(--primary-color);
    }

    .detail-label {
        display: block;
        font-size: 0.8rem;
        color: var(--dark-text);
        opacity: 0.7;
    }

    .detail-value {
        display: block;
        font-size: 1.2rem;
        font-weight: 500;
        color: var(--primary-dark);
    }

    /* Agricultural Advisory */
    .weather-agricultural {
        padding: 1.5rem;
        background: rgba(255, 160, 0, 0.1);
        border-top: 1px solid rgba(255, 160, 0, 0.3);
    }

    .weather-agricultural h3 {
        margin-top: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary-dark);
    }

    .advisory-content {
        margin-top: 1rem;
    }

    .advisory-content p {
        margin: 0;
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
    }

    /* Error Message */
    .weather-error {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.5rem;
        background: rgba(244, 67, 54, 0.1);
        border-radius: 10px;
        color: #f44336;
    }

    .weather-error i {
        font-size: 1.5rem;
    }

    /* Responsive */
    @media (max-width: 600px) {
        .weather-header h1 {
            font-size: 1.8rem;
        }

        .search-input-group {
            flex-direction: column;
            border-radius: 15px;
            padding: 1rem;
        }

        .search-input-group i {
            display: none;
        }

        .search-input-group input {
            width: 100%;
            margin-bottom: 1rem;
            padding: 0.8rem;
            border-bottom: 1px solid #eee;
        }

        .search-button {
            width: 100%;
            justify-content: center;
        }

        .temperature-display {
            flex-direction: column;
            text-align: center;
        }

        .temp-value {
            font-size: 3rem;
        }

        .weather-details {
            grid-template-columns: 1fr 1fr;
        }
    }
</style>
@endsection