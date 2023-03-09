<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" width="100%;">
            <thead>
               <tr>
                   <th>#</th>
                   <th>Platform</th>
                   <th>Provider Id</th>
                   <th>Joined on</th>
               </tr>
            </thead>
            <tbody>
                @if ($accounts->count() > 0)
                    @foreach ($accounts as $index=>$account)
                    <tr>
                        <td>{{++$index}}</td>
                        <td>{{strtoupper($account->provider)}}</td>
                        <td>{{$account->provider_id}}</td>
                        <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($account->created_at))->format('d-m-Y') }}</td>
                    </tr>        
                    @endforeach
                @else
                <tr>
                    <td colspan="4" align="center">No record found</td>
                </tr>
                @endif
                
            </tbody>
        </table>
    </div>
</div>
