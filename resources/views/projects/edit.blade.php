<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Edit Project</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-gray-800" x-data="{ mobileOpen: false, profileOpen: false }">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
               <div class="flex h-16 items-center justify-between">

                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
                        </div>

                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="/profile" aria-current="page" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Profile</a>
                                <a href="/dashboard" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Dashboard</a>
                                <a href="/projects" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
                                <a href="/tugas" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Tasks</a>
                            </div>
                        </div>
                    </div>

                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6 relative" x-data="{ open: false }">
                            <!-- Profile dropdown -->
                            <button @click="open = !open" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none">
                                <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User" />
                            </button>
                            <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 z-50">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="-mr-2 flex md:hidden">
                        <button @click="mobileOpen = !mobileOpen" type="button"
                            class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none">
                            <svg x-show="!mobileOpen" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg x-show="mobileOpen" x-cloak class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div class="md:hidden" x-show="mobileOpen" x-transition>
                <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="/profile" aria-current="page" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Profile</a>
                    <a href="/dashboard" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Dashboard</a>
                    <a href="/projects" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
                    <a href="/tugas" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Tasks</a>
                </div>

                <div class="border-t border-gray-700 pt-4 pb-3">
                    <div class="flex items-center px-5">
                        <div class="ml-3">
                            <div class="text-base/5 font-medium text-white">Tom Cook</div>
                            <div class="text-sm font-medium text-gray-400">tom@example.com</div>
                        </div>
                    </div>

                    <div class="mt-3 space-y-1 px-2">
                        <a href="/profile" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
                        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow-sm">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Projects</h1>
            </div>
        </header>
  
        <!-- Your content -->
        <main>
            <div class="mx-auto max-w-2xl px-4 py-6 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Project</h2>

                <form method="POST" action="{{ route('projects.update', $project) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- nama project --}}
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Name</label>
                        <input type="text" name="name" value="{{ old('name', $project->name) }}" class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
                        @error('name')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- deskripsi --}}
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Description</label>
                        <textarea name="description" class="w-full border rounded px-3 py-2 @error('description') border-red-500 @enderror">{{ old('description', $project->description) }}</textarea>
                        @error('description')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- deadline --}}
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Deadline</label>
                        <input type="date" name="deadline" value="{{ old('deadline', $project->deadline->format('Y-m-d')) }}" class="w-full border rounded px-3 py-2 @error('deadline') border-red-500 @enderror">
                        @error('deadline')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- status --}}
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Status</label>
                        <select name="status" class="w-full border rounded px-3 py-2 @error('status') border-red-500 @enderror">
                            @foreach (['not-started', 'in-progress', 'completed'] as $status)
                                <option value="{{ $status }}" @selected(old('status', $project->status) === $status)>
                                    {{ ucfirst(str_replace('-', ' ', $status)) }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('projects.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Update Project</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>