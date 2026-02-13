<div style="max-width:500px; margin:50px auto; padding:25px; background:#ffffff; border-radius:10px; box-shadow:0 6px 15px rgba(0,0,0,0.1);">

    <h2 style="font-size:22px; font-weight:bold; margin-bottom:20px;">
        Create Company
    </h2>

    <form method="POST" action="{{ route('companies.store') }}">
        @csrf

        <div style="margin-bottom:15px;">
            <input
                type="text"
                name="name"
                placeholder="Enter Company Name"
                required
                style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:14px;"
            >
        </div>

        <div style="display:flex; justify-content:space-between; align-items:center;">

            <a href="{{ route('dashboard') }}"
               style="background-color:#6b7280; color:white; padding:8px 16px; border-radius:6px; text-decoration:none;">
                ← Back
            </a>

            <button
                type="submit"
                style="background-color:#2563eb; color:white; padding:10px 18px; border:none; border-radius:6px; cursor:pointer; font-weight:600;">
                Create Company
            </button>

        </div>
    </form>

</div>
