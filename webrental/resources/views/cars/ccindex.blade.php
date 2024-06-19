<h1>Cars</h1>

<table>
    <thead>
        <tr>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>Description</th>
            <th>Price per day</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
        <tr>
            <td>{{ $car->make }}</td>
            <td>{{ $car->model }}</td>
            <td>{{ $car->year }}</td>
            <td>{{ $car->description }}</td>
            <td>{{ $car->price_per_day }}</td>
        </tr>
        @endforeach
    </tbody>
</table>