<div class="icon-fixed">
    <ul>
        @if (!empty($configs['sc_phone_active']))
            <li>
                <a href="tel:{{ $configs['sc_phone_number'] ?? '' }}">
                    <img src="{{ $configs['sc_phone_icon'] ?? '' }}" alt="icon" class="ring">
                </a>
            </li>
        @endif
        @if (!empty($configs['sc_messenger_active']))
            <li>
                <a target="_blank" href="{{ $configs['sc_messenger_link'] ?? '' }}">
                    <img src="{{ $configs['sc_messenger_icon'] ?? '' }}" alt="icon">
                </a>
            </li>
        @endif
        @if (!empty($configs['sc_zalo_active']))
            <li>
                <a target="_blank" href="{{ $configs['sc_zalo_link'] ?? '' }}">
                    <img src="{{ $configs['sc_zalo_icon'] ?? '' }}" alt="icon">
                </a>
            </li>
        @endif

    </ul>
</div>
