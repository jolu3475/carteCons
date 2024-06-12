@extends('backOfiice')


@section('title', 'Dashboard')

@section('css')
    {{-- css pour datatables --}}
    <link href="{{ asset('datatable/css/dataTables.bootstrap5.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('datatable/css/buttons.bootstrap5.css') }}" type="text/css" rel="stylesheet">
@endsection


@section('content')
    <p class="p-5 h1 ">Graphique de donnée</p>

    <div class=" rounded-3 p-4 shadow" style="background-color:#d5dadd">
        <div class="container">

            <div class="card">
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <p class="p-5 h1">Mon Tableau de Bord</p>
    <div class=" rounded-3 p-4 shadow" style="background-color:#d5dadd">

        <div class="container">

            <table id="example" class="table table-striped rounded-3" style="width:100%; max-width:none">
                <thead class=" table-hover">
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>$170,750</td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009/01/12</td>
                        <td>$86,000</td>
                    </tr>
                    <tr>
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>2012/03/29</td>
                        <td>$433,060</td>
                    </tr>
                    <tr>
                        <td>Airi Satou</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>33</td>
                        <td>2008/11/28</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td>Brielle Williamson</td>
                        <td>Integration Specialist</td>
                        <td>New York</td>
                        <td>61</td>
                        <td>2012/12/02</td>
                        <td>$372,000</td>
                    </tr>
                    <tr>
                        <td>Herrod Chandler</td>
                        <td>Sales Assistant</td>
                        <td>San Francisco</td>
                        <td>59</td>
                        <td>2012/08/06</td>
                        <td>$137,500</td>
                    </tr>
                    <tr>
                        <td>Rhona Davidson</td>
                        <td>Integration Specialist</td>
                        <td>Tokyo </td>
                        <td>55</td>
                        <td>2010/10/14</td>
                        <td>$327,900</td>
                </tbody>
                <tfoot class="table-group-divider">
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot>
            </table>

        </div>

    </div>

    {{-- Le graphique --}}

    <script src={{ asset('js/canvas.js') }}></script>

    {{-- call of the js --}}

    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('datatable/js/buttons.bootstrap5.js') }}"></script>
    <script src="{{ asset('datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('datatable/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Blfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                searching: true,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                responsiveBreakpoints: {
                    desktop: {
                        target: 'xl',
                        landscape: {
                            target: 'lg'
                        }
                    },
                    tablet: {
                        target: 'md',
                        landscape: {
                            target: 'sm'
                        }
                    },
                    phone: 'xs'
                },
                autoWidth: false
            });
        });
    </script>
@endsection
