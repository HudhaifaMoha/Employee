<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Verified Employee</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-green-50 to-white min-h-screen flex items-center justify-center py-10">
    <div class="bg-white rounded-2xl shadow-2xl border border-green-100 p-6 w-full max-w-sm text-center relative">

        {{-- إطار التحقق --}}
        <div class="absolute top-4 right-4 bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Verified
        </div>

        {{-- صورة الموظف --}}
        <img src="{{ asset('storage/' . $employee->photo) }}" alt="Photo" class="w-28 h-28 rounded-full object-cover mx-auto border-4 border-green-200 mb-4 shadow-md">

        {{-- الاسم والمسمى --}}
        <h2 class="text-2xl font-bold text-gray-800">{{ $employee->name }}</h2>
        <p class="text-gray-500 text-sm">{{ $employee->job_title }}</p>

        {{-- الرقم الوظيفي --}}
        <p class="text-gray-400 text-xs mt-1">Employee ID: {{ $employee->employee_number }}</p>

        {{-- QR Code --}}
        <div class="mt-6">
            <p class="text-xs text-gray-400 mb-1">Scan this code to verify</p>
            <div class="mx-auto w-fit bg-gray-50 p-2 border rounded">
                {!! QrCode::size(100)->generate(route('employee.verify', $employee->slug)) !!}
            </div>
        </div>

        {{-- ختم التحقق --}}
        <div class="mt-6 text-sm text-green-600 font-semibold flex justify-center items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            This employee has been verified
        </div>

        {{-- توقيع / شعار (اختياري) --}}
        <div class="mt-6 text-xs text-gray-400">
            Verified by <span class="font-semibold text-gray-600">YourCompany</span>
        </div>
    </div>
</body>
</html>
