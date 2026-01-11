<!DOCTYPE html>
<html>
<head>
    <title>Class Routine</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h1, h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #333; padding: 6px; text-align: center; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Class Routine</h1>

    @forelse($routines as $classId => $classRoutines)
        @php
            $className = \App\Models\SchoolClass::find($classId)->name ?? 'Unknown Class';
        @endphp
        <h2>Class: {{ $className }}</h2>

        @foreach($classRoutines->groupBy('section_id') as $sectionId => $sectionRoutines)
            @php
                $sectionName = \App\Models\Section::find($sectionId)->name ?? 'Unknown Section';
            @endphp
            <h3>Section: {{ $sectionName }}</h3>

            <table>
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Subject</th>
                        <th>Teacher</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sectionRoutines as $routine)
                        <tr>
                            <td>{{ $routine->day }}</td>
                            <td>{{ $routine->subject->name ?? 'Unknown' }}</td>
                            <td>{{ $routine->teacher->name ?? 'Unknown' }}</td>
                            <td>{{ $routine->start_time }} - {{ $routine->end_time }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    @empty
        <p>No routines available</p>
    @endforelse
</body>
</html>
