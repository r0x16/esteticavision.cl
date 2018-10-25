<tr>
    <td>{{$quote->id}}</td>
    <td>{{$quote->created_at->format('d-m-Y H:i')}}</td>
    <td>
    <span class="badge badge-{{$quote->statusMessage['color']}}">
            {{$quote->statusMessage['message']}}
    </span>
    </td>
    <td>
        <a href="{{route('show_quotation', ['quotation' => $quote->id])}}" class="btn btn-primary">
            Ver
        </a>
    </td>
</tr>