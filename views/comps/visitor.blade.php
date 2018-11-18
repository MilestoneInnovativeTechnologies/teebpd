<div class="block-top-link pull-right">
    <aside id="nav_menu-21" class="widget widget_nav_menu">
        <div class="widget-custom-menu "><h3 class="widget-title">My Account</h3>
            <div class="menu-top-menu-container">
                @if($visitor)
                    <div style="color: #e5ae49; font-size: 16px; border-bottom: 1px solid #e5ae49; width: 170px">{{ $visitor->name }}</div>
                    <ul id="menu-top-menu" class="menu">
                        <li><span class="menu-item-text">{{ $visitor->email }}</span></li>
                        <li><span class="menu-item-text">{{ $visitor->number }}</span></li>
                        <li><a href="{{ route('wishlist') }}"><span class="menu-item-text">View Wishlists</span></a></li>
                        <li style="margin-top: 3px;" class="text-center">
                            <form method="post" action="{{ route('clear.visitor') }}">@csrf <input type="hidden" name="_clu" value="{{ $visitor->id }}"><input class="btn-xs" type="submit" value="Not You?, Clear"></form>
                        </li>
                    </ul>
                @else
                    <div style="color: #e5ae49; font-size: 16px; border-bottom: 1px solid #e5ae49; width: 170px">Set your details</div>
                    <form method="post" action="{{ route('store.visitor') }}" onsubmit="return setVisitorValidate()">@csrf
                    <ul id="menu-top-menu" class="menu">
                        <li style="margin-top: 3px;"><input type="text" name="name" value="" size="40" placeholder="Enter Your Name ..." autocomplete="off"></li>
                        <li style="margin-top: 3px;"><input type="email" name="email" value="" size="40" placeholder="Enter Your Email ..." autocomplete="off"></li>
                        <li style="margin-top: 3px;"><input type="text" name="number" value="" size="40" placeholder="Enter Your Number ..." autocomplete="off"></li>
                        <li style="margin-top: 3px;"><small style="visibility: hidden;color: #900b00;">Please fill name and either Mobile or Email</small><input type="submit" class="pull-right" name="set-visitor" value="Submit"></li>
                    </ul>
                        @push('script')<script type="text/javascript">
                            function setVisitorValidate(){
                                email = $('[name="email"]','#menu-top-menu').val(); number = $('[name="number"]','#menu-top-menu').val(); name = $('[name="name"]','#menu-top-menu').val();
                                if((email.trim() == "" && number.trim() == "") || name.trim() == "") { $('small','#menu-top-menu').css('visibility','visible'); return false }
                                $('small','#menu-top-menu').css('visibility','hidden'); return true;
                            }
                        </script>@endpush
                    </form>
                @endif
            </div>
        </div>
    </aside>
</div>
