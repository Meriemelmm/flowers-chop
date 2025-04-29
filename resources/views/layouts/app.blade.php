<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique de Fleurs - Produits</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#e84c93',secondary:'#4a8b3b'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#e84c93',
            secondary: '#4a8b3b'
          },
          borderRadius: {
            button: '8px'
          }
        }
      }
    }
  </script>
  <style>
     :where([class^="ri-"])::before { content: "\f3c2"; }
        body {
            font-family: 'Poppins', sans-serif;
        }
        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
        }
        .hero-section {
          background-image: url("{{ asset('section.png.jpg') }}");

        background-size: cover;
        background-position: center;
        }
        .category-card:hover .category-overlay {
            opacity: 1;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .custom-checkbox {
            position: relative;
            cursor: pointer;
        }
        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #fff;
            border: 2px solid #e2e8f0;
            border-radius: 4px;
        }
        .custom-checkbox:hover input ~ .checkmark {
            border-color: #e84393;
        }
        .custom-checkbox input:checked ~ .checkmark {
            background-color: #e84393;
            border-color: #e84393;
        }
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }
        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }
        .custom-checkbox .checkmark:after {
            left: 6px;
            top: 2px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
    .thumbnail {
      transition: all 0.3s ease;
    }
    .thumbnail:hover {
      transform: scale(1.05);
    }
    .thumbnail.active {
      border-color: #e84c93;
      box-shadow: 0 0 0 2px rgba(232, 76, 147, 0.3);
    }
  </style>
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #e84c93;
            cursor: pointer;
        }
        
        input[type="range"]::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #e84c93;
            cursor: pointer;
            border: none;
        }
        
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        input[type="number"] {
            -moz-appearance: textfield;
        }
        
        .custom-checkbox {
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        
        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }
        
        .checkmark {
            height: 20px;
            width: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            position: relative;
        }
        
        .custom-checkbox input:checked ~ .checkmark {
            background-color: #e84c93;
            border-color: #e84c93;
        }
        
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
            left: 7px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
        
        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }
        
        .custom-select {
            position: relative;
            display: inline-block;
            width: 100%;
        }
        
        .custom-select-selected {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px 14px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .custom-select-options {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 10;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-top: 4px;
            max-height: 200px;
            overflow-y: auto;
            display: none;
        }
        
        .custom-select-option {
            padding: 10px 14px;
            cursor: pointer;
        }
        
        .custom-select-option:hover {
            background-color: #f9f9f9;
        }
        
        .custom-pagination-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            cursor: pointer;
        }
        
        .custom-pagination-button.active {
            background-color: #e84c93;
            color: white;
        }
        
        .custom-pagination-button:hover:not(.active) {
            background-color: #f3f4f6;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/carte.css') }}">

</head>
<body class="bg-gray-50 text-gray-800">
    @include('components.header')

   
    @yield('content')
    @include('components.footer');

    @yield('scripts')
    
</body>
</html>