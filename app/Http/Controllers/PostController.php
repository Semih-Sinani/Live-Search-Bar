<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::where('id', 'like', '%' . $request->search . '%')
                ->orwhere('text', 'like', '%' . $request->search)
                ->orwhere('description', 'like', '%' . $request->search)->get();

            $output = '';
            if (count($data) > 0) {

                $output = '

                    <table class="table">
                    <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">text</th>
                    <th scope="col">Description</th>
                    </tr>
                    </thead>
                    <tbody>';


                foreach ($data as $row) {
                    $output .= '
                        <tr>
                        <th scope="row">' . $row->id . '</th>
                        <td>' . $row->text . '</td>
                        <td>' . $row->description . '</td>
                        </tr>
                        ';
                }

                $output .= '
                        </tbody>
                        </table>';
            } else {
                $output .= 'No result';
            }

            return $output;
        }
    }
}
