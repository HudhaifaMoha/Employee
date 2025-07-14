<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Employee ID Card</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center py-10 print:bg-white">
    <div
        class="bg-white rounded-2xl shadow-2xl border border-gray-200 p-6 w-full max-w-sm text-center relative print:shadow-none print:border-none">

        {{-- شريط أعلى البطاقة --}}
        <div
            class="absolute top-4 right-4 bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded-full flex items-center gap-1 print:hidden">
            ID Card
        </div>

        {{-- صورة الموظف --}}
        <img src="{{ asset('storage/' . $employee->photo) }}" alt="Photo"
            class="w-28 h-28 rounded-full object-cover mx-auto border-4 border-blue-200 mb-4 shadow-md">

        {{-- الاسم والمسمى --}}
        <h2 class="text-2xl font-bold text-gray-800">{{ $employee->name }}</h2>
        <p class="text-gray-500 text-sm">{{ $employee->job_title }}</p>

        {{-- الرقم الوظيفي --}}
        <p class="text-gray-400 text-xs mt-1">Employee ID: {{ $employee->employee_number }}</p>

        {{-- QR Code --}}
        <div class="mt-6">
            <p class="text-xs text-gray-400 mb-1 print:hidden">Scan this code to verify</p>
            <div class="mx-auto w-fit bg-gray-50 p-2 border rounded">
                {!! QrCode::size(100)->generate(route('employee.verify', $employee->slug)) !!}
            </div>
        </div>

        {{-- زر الطباعة --}}
        <div class="mt-6 print:hidden">
            <button onclick="window.print()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Print Card
            </button>
        </div>

        {{-- ختم أو توقيع الشركة --}}
        <div class="mt-6 text-xs text-gray-400">
            Issued by <span class="font-semibold text-gray-600">YourCompany</span>
        </div>
    </div>
</body>

</html>
