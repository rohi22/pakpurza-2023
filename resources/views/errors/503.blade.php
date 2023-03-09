<style>
        body{
        	margin: 0;
        }
     .right-back-main{
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
        height:100vh;
        width:100%;
        font-family:Poppins, Helvetica, sans-serif;;
    }
    .title b{
        color:white;
        font-size:28px;
        text-shadow: 2px 2px 2px #C6CECD;
    }
    .tag-line b{
        color:white;
        font-size:28px;
        text-shadow: 2px 2px 2px #C6CECD;
    }
    .description b{
        color:white;
        font-size:28px;
        text-shadow: 2px 2px 2px #C6CECD;
    }
    .description{
        width:50%;
    }
    
    p{
        color:grey;
    }
    
</style>

@php $webSetting = App\Models\WebSetting::where('id', 1)->first(); @endphp
<div class="right-back-main">
     @if($webSetting->developer_image)
     <div class="right-back-main" style="background-image:url({{URL::asset('public/assets/media/developer-mode/'.$webSetting->developer_image)}}); background-size:cover; background-repeat:norepeat">
 
    @endif
    <p class="title"><b>Title: </b> {{ $webSetting->developer_title }} </p>
    
    <p class="tag-line"><b>Tag Line:</b>{{ $webSetting->developer_tag_line }} </p>
    
    <p class="description"><b>Description: </b>{{ $webSetting->developer_description }} <p>   
</div>
