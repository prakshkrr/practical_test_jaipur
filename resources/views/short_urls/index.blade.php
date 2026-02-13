<div style="max-width:900px; margin:40px auto; padding:20px; background:#ffffff; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">

    <h2 style="font-size:22px; font-weight:bold; margin-bottom:20px;">
        Short URLs
    </h2>
    <div>
        <a href="{{ route('dashboard') }}"
            style="background-color:#6b7280; color:white; padding:8px 14px; border-radius:6px; text-decoration:none; margin-right:8px;">
                ← Dashboard
        </a>
    </div>
    <table style="width:100%; border-collapse:collapse;">

        <thead>
            <tr style="background-color:#f3f4f6; text-align:left;">
                <th style="padding:12px; border-bottom:2px solid #e5e7eb;">Original URL</th>
                <th style="padding:12px; border-bottom:2px solid #e5e7eb;">Short Code</th>
                <th style="padding:12px; border-bottom:2px solid #e5e7eb;">Created By</th>
            </tr>
        </thead>

        <tbody>
            @forelse($urls as $url)
                <tr style="border-bottom:1px solid #e5e7eb;">
                    <td style="padding:12px;">
                        <a href="{{ $url->original_url }}" target="_blank" style="color:#2563eb; text-decoration:none;">
                            {{ $url->original_url }}
                        </a>
                    </td>

                    <td style="padding:12px; font-weight:600;">
                        {{ $url->short_code }}
                    </td>

                    <td style="padding:12px;">
                        {{ $url->user->name ?? 'N/A' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="padding:20px; text-align:center; color:#6b7280;">
                        No short URLs found.
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

</div>
