<div style="max-width:700px; margin:50px auto; padding:25px; background:#ffffff; border-radius:10px; box-shadow:0 6px 15px rgba(0,0,0,0.1);">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h2 style="font-size:22px; font-weight:bold;">
            Companies
        </h2>

        <div>
            <a href="{{ route('dashboard') }}"
               style="background-color:#6b7280; color:white; padding:8px 14px; border-radius:6px; text-decoration:none; margin-right:8px;">
                ← Dashboard
            </a>

            <a href="{{ route('companies.create') }}"
               style="background-color:#2563eb; color:white; padding:8px 14px; border-radius:6px; text-decoration:none;">
                + Create Company
            </a>
        </div>
    </div>

    <div>
        @forelse($companies as $company)
            <div style="padding:12px; border-bottom:1px solid #e5e7eb;">
                {{ $company->name }}
            </div>
        @empty
            <div style="padding:20px; text-align:center; color:#6b7280;">
                No companies found.
            </div>
        @endforelse
    </div>

</div>
