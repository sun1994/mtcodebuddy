<x-header />
<h3 style="text-align: center;">Add Category</h3>


<form action="addcat" method="post">
    @csrf
    <span>Category Name : <input type="text" name="catname" class="catInput" placeholder="Add Category Name" /></span>
    <br />
    <br />
    <span>
        Select Category : <select name="selectcat" >
            <option value="0">Selected</option>
            @if((isset($arrList)) && (count($arrList) > 0))
                @for($i = 0; $i < count($arrList); $i++)
                    <option value="{{$arrList[$i]->id}}">{{$arrList[$i]->name}}</option>
                @endfor
            @else
                <option value="0">Selected</option>
            @endif

        </select>
    </span>
    <br />
    <br />
    <span>Descryption: <textarea name="descryption" cols="30" rows="10" class="catInput" placeholder="Add category descryption" ></textarea></span>
    <!-- <br /> -->
    <!-- <input type="text" name="descryption" class="catInput" /> -->
    <br />
    <br />
    <button type="submit">Add</button>
</form>