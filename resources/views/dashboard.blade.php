<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Main Menu') }}
        </h2>
    </x-slot>

    <!-- Main container -->
    <style>
        /* Global styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Light gray background */
        }

        .main-container {
            padding: 20px;
        }

        .card {
            background-color: #fff; /* White background */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        /* Header styles */
        .header {
            background-color: #1e3a8a; /* Dark blue background */
            color: white; /* White text */
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            text-transform: uppercase;
        }

        .header img {
            height: 40px;
        }

        /* Content styles */
        .content {
            padding: 30px;
            text-align: center;
        }

        .content h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333; /* Dark gray text */
        }

        /* Buttons section */
        .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            padding: 15px 30px;
            background-color: #f59e0b; /* Yellow background */
            color: white; /* White text */
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #d97706; /* Darker yellow on hover */
        }

        /* Footer styles */
        .footer {
            background-color: #1e3a8a; /* Dark blue background */
            color: white; /* White text */
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }
    </style>

    <div class="main-container">
        <div class="card">
            <!-- Header section -->
            <div class="header">
                <h1>EASYSHOPPING</h1>
                <img src="{{ asset('path/to/account-icon.png') }}" alt="Account Icon">
                <!-- Replace 'path/to/account-icon.png' with the actual path to your image -->
            </div>

            <!-- Content section -->
            <div class="content">
                <h1>WELCOME TO EASY SHOPPING MANAGEMENT</h1>
                <div class="buttons">
                    <!-- Book Management Button -->
                    <a href="{{ route('book-management') }}" class="button">Shopping Management</a>

                    <!-- Order Management Button -->
                    <a href="{{ route('order-management') }}" class="button">Order Management</a>
                </div>
            </div>

            <!-- Footer section -->
            <div class="footer">
                © 2024 EasyShopping. All rights reserved.
            </div>
        </div>
    </div>
</x-app-layout>
