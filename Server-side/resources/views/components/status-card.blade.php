@props([
    'title',
    'value',
    'iconClass' => '',
    'iconColor' => '',
    'iconBg' => '',
])
<div class="status-card v bg-white rounded-xl shadow-sm p-5 border border-gray-100 transition-all duration-300">
    <div class="flex justify-between items-start">
        <div>
            <p class="text-sm text-gray-500 font-medium">{{ $title }}</p>
            <p class="text-2xl font-bold text-gray-800 mt-1">{{ $value }}</p>
        </div>
        <div class="{{ $iconBg }} p-3 rounded-lg">
            <i class="{{ $iconClass }} {{ $iconColor }} text-xl"></i>
        </div>
    </div>
</div>
