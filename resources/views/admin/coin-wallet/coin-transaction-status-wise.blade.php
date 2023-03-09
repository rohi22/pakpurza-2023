@if ($transactions->count() > 0)
@foreach ($transactions as $index=>$item)
    <tr>
        <td align="center">{{++$index}}</td>
        <td align="center">{{isset($item->getUser) ? $item->getUser->unique_id : ''}}</td>
        <td align="center">{{ date("d-m-Y", strtotime($item->date))}}</td>
        <td align="center">{{$item->transaction_id}}</td>
        <td align="center">{{$item->plan}}</td>
        <td align="center">{{$item->type}}</td>
        <td align="center">@if($item->type=="Credit") +{{number_format($item->coins,2)}} @elseif($item->type=="Debit") -{{number_format($item->coins,2)}} @endif</td>
    </tr>
@endforeach
@endif