@if ($type === 'error' && $message)
    <div class="alert-message error">
        <span class="icon">✖</span>
        <span class="message-text">{{ $message }}</span>
    </div>
@elseif ($type === 'success' && $message)
    <div class="alert-message success">
        <span class="icon">✔</span>
        <span class="message-text">{{ $message }}</span>
    </div>
@endif
