<table id="table" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th scope="col">No</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col" >User Email</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Upload Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                            @endphp
                                        @foreach($images as $key=>$value)
                                            
                                           <tr class="row-{{$value->id}}">
                                               <td></td>
                                               <td>{{$i++}}</td>
                                               <td>{{@$value->user->name}}</td>
                                               <td>{{@$value->user->email}}</td>
                                               <td class="imagediv">
                                                   <div style="width: 80px;margin: auto;">
                                                       <a href="{{$value->url}}" target="_blank">
                                                           <img class="card-img max-img" src="{{$value->url}}">
                                                       </a>
                                                   </div>

                                                   <div style="width: 100px;margin:auto;text-align: center;">
                                                       <button id="remove-{{$value->id}}" onclick="remove(this.id)" class="btn btn-primary" style="width:80px; border-radius:0px; color:red;background:white;border:1px solid red; padding-top: 0px;padding-bottom: 0px;margin-top: 4px;">
                                                           <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                           <p class="removeid" style="display:none;">{{$value->id}}</p>
                                                       </button>
                                                   </div>

                                                </td>
                                               <td>{{$value->upload_date}}</td>
                                           </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$images->links()}}