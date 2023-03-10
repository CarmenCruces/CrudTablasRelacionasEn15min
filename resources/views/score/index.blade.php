@extends('layouts.app')

@section('template_title')
    Score
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Score') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('scores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Id Students</th>
										<th>Mark</th>
										<th>Quarter</th>
										<th>Subject</th>
										<th>Course</th>
										<th>Academicyear</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scores as $score)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $score->id_students }}</td>
											<td>{{ $score->mark }}</td>
											<td>{{ $score->quarter }}</td>
											<td>{{ $score->subject }}</td>
											<td>{{ $score->course }}</td>
											<td>{{ $score->academicYear }}</td>

                                            <td>
                                                <form action="{{ route('scores.destroy',$score->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('scores.show',$score->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('scores.edit',$score->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $scores->links() !!}
            </div>
        </div>
    </div>
@endsection
