

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Program;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the count of users and programs
        $totalUsers = User::count();
        $totalModules = Program::count();

        // Pass these variables to the view
        return view('admin.dashboard', compact('totalUsers', 'totalModules'));
    }
}
