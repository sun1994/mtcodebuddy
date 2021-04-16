
<x-header />
<h3 style="text-align: center;">Category List</h3>


@for($i = 0; $i < count($data); $i++)
    <ul>
        <li>
            <a href="category/{{$data[$i]['id']}}"> {{$data[$i]["name"]}} -- {{$data[$i]["descryption"]}}</a>
            <ul>
            @for($j = 0; $j < count($data[$i]["subcat"]); $j++)
                <li>
                    <a href="category/{{$data[$i]['subcat'][$j]['id']}}">{{$data[$i]["subcat"][$j]["name"]}} -- {{$data[$i]["subcat"][$j]["descryption"]}}
                </li>
            @endfor
            </ul>
        </li>
    </ul>
@endfor