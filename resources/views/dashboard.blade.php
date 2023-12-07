<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl dark:text-white-400 leading-tight">
                {{ __('RaceHub Central Dashboard') }}
            </h2>
    
            <h2 class="text-white">
                You're logged in.

            </h2>
        </div>
    </x-slot>
    

    @auth

    <div class="py-12 bg-black ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-600 dark:bg-red-700 overflow-hidden shadow-sm mb-4">
                <div class="p-6 text-white">
                    <img src="https://iadt-my.sharepoint.com/personal/n00220743_iadt_ie/Documents/Year%202/Year%202%20Semester%201/Advanced%20Web%20Design/MyLaravelApps/Frame%201.png?Web=1" alt="RaceHub Central" class="w-full h-auto">
                </div>
            </div>
        </div>
    </div>

        <div class="py-12 bg-black dark:bg-red-800">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" bg-red-600 dark:bg-red-700 overflow-hidden shadow-sm mb-2">
                
                </div>
            </div>
        </div>

        <div class="py-12 bg-black dark:bg-red-800">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-red-600 dark:bg-red-700 overflow-hidden shadow-sm mb-4">
                <div class="p-6 text-white">
                    <p>Welcome to RaceCentral Hub, your central hub for all things racing. With our app, you can effortlessly manage your races, track performance metrics, and stay at the forefront of the dynamic race world.</p>
                    <p>Support your favorite drivers by getting real-time updates on their races, achievements, and standings. Keep track of upcoming events, view race statistics, and engage with a passionate community of racing enthusiasts.</p>
                    <p>RaceCentral Hub was born out of a passion for motorsports and the desire to create a comprehensive platform for fans and professionals alike. Our mission is to provide an intuitive and feature-rich experience, bringing the excitement of racing closer to you.</p>
                </div>
            </div>
        </div>
    </div>


    @endauth
</x-app-layout>
