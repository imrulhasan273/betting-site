{!! Form::open(['method' => 'PATCH','action' => ['OrderController@update',$order_items->id], 'class'=>'table_form']) !!}

@foreach($order_items as $oi)
  <tr class="order-form-row">
  <td>
   {{ $oi->name }}
 </td>
  <td>
  <a data-item="{{ $oi->id }}" class="btn btn-block" data-toggle="modal" data-target="#deleteLineItemModal"><i class="icon-trash"></i></a>
  </td>
  </tr>
@endforeach
{!! Form::close() !!}


{{--bootstrap modal--}}
  <div class="modal fade" id="deleteLineItemModal" tabindex="-1" role="dialog" aria-labelledby="deleteLineItemModal" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body edit-content">
            <h5 class="text-center">Are you sure you want to delete this line item? {{$oi->id}}</h5>
        </div>
        <div class="modal-footer">
            <a href="/orders/line-item-delete/{{$oi->id}}" id="lineitem"><button type="button" class="btn btn-danger pull-left">Yes, I am sure</button></a>
            <button type="button" class="btn btn-primary" data-dismiss="modal">No, not today</button>
        </div>
    </div>
</div>
<script>
 $(document).on("click", ".btn-block", function () {
    var itemid= $(this).attr('data-item');
    $("#lineitem").attr("href","/orders/line-item-delete/"+itemid)
 });
 </script>
