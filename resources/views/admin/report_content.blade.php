<div class="container">
    <h2 align="center">{{ 'Report №' . $report->id }}</h2>
    <h3>{{ 'Total sum:' . $report->total_amount }}</h3>
    <h3>{{ 'Total discount sum:' . $report->discount_amount }}</h3>
    <h2 align="center">Reports for each waitress</h2>

    <table class="table table-striped table-hover table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Total sum</th>
            <th>Total discount sum</th>
        </tr>
        </thead>
        <tbody>
        @foreach($report->waiterReports as $wr)
        <tr>
            <td>{{ $wr->waiter }}</td>
            <td>{{ $wr->total_amount }}</td>
            <td>{{ $wr->discount_amount }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>