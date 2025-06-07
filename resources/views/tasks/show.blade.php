@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6 bg-gray-50 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">Task Details</h2>
            <div class="flex space-x-2">
                <a href="{{ route('tasks.edit', $task->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition">
                    Edit
                </a>
                <button class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition delete-task-btn" 
                        data-url="{{ route('tasks.destroy', $task->id) }}">
                    Delete
                </button>
            </div>
        </div>
        
        <div class="p-6">
            <div class="mb-6">
                <div class="flex items-center mb-4">
                    @if($task->status == 'completed')
                        <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-green-100 mr-3">
                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </span>
                    @elseif($task->status == 'in_progress')
                        <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-blue-100 mr-3">
                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                    @else
                        <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-gray-100 mr-3">
                            <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                    @endif
                    <h1 class="text-3xl font-bold text-gray-900">{{ $task->title }}</h1>
                </div>
                
                <div class="flex flex-wrap gap-2 mb-4">
                    @if($task->priority == 'high')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                            High Priority
                        </span>
                    @elseif($task->priority == 'medium')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                            Medium Priority
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            Low Priority
                        </span>
                    @endif
                    
                    @if($task->status == 'completed')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            Completed
                        </span>
                    @elseif($task->status == 'in_progress')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            In Progress
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                            Pending
                        </span>
                    @endif
                    
                    @if($task->due_date)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Due: {{ $task->due_date->format('M d, Y') }}
                        </span>
                    @endif
                </div>
                
                <div class="bg-gray-50 rounded-lg p-4 mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Description</h3>
                    <div class="prose max-w-none">
                        @if($task->description)
                            <p class="text-gray-700">{{ $task->description }}</p>
                        @else
                            <p class="text-gray-500 italic">No description provided</p>
                        @endif
                    </div>
                </div>
                
                <div class="text-sm text-gray-500">
                    <p>Created: {{ $task->created_at->format('M d, Y H:i') }}</p>
                    <p>Last Updated: {{ $task->updated_at->format('M d, Y H:i') }}</p>
                </div>
            </div>
            
            <div class="mt-6 border-t pt-4">
                <a href="{{ route('tasks.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                    <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Tasks
                </a>
            </div>
        </div>
    </div>
    @include('components.delete-confirmation')
@endsection
