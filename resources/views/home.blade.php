@extends('adminlte::page')
@section('content')
    <div class="content">
        <div class="row">
            @foreach ($number_blocks as $block)
            <div class="col-md-4 ">
                <div class="info-box">
                        <span class=" bg-red"
                              style="display:flex; flex-direction: column; justify-content: center;">
                            
                        </span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ $block['title'] }}</span>
                        <span class="info-box-number">{{ $block['number'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            @foreach ($list_blocks as $block)
                <div class="col-md-6">
                    <h3>{{ $block['title'] }}</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Last login at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($block['entries'] as $entry)
                            <tr>
                                <td>{{ $entry->name }}</td>
                                <td>{{ $entry->email }}</td>
                                <td>{{ $entry->last_login_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">{{ __('No entries found') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>

        
    </div>
@endsection
@section('scripts')
   
   
@endsection