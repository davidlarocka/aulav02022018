<?php
namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use DB;
use Validator;
use App\Http\Requests\MessagesRequest;

class MessagesController extends Controller
{
    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function index($id)
    {
        // All threads, ignore deleted/archived participants
        //$threads = Thread::getAllLatest()->get();
        // All threads that user is participating in
        //$threads = Thread::forUser(Auth::id())->latest('updated_at')->get();
        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages(Auth::id())->latest('updated_at')->get();
        //Todos los threads según el id del proyecto
        $proyecto = DB::table('proyectos')
                    ->select('nombre_proyecto','descripcion','fecha_entrega','archivo','url','observaciones','name','primer_apellido')
                    ->join('users','users.id','=','proyectos.id_profesor')
                    ->where('proyectos.id','=',$id)->get();
        $threads = Thread::where('id_proyecto', '=', $id)->get();
        return view('admin.messenger.index', compact('threads','id','proyecto'));
    }
    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $proyecto = DB::table('proyectos')
                    ->select('nombre_proyecto','descripcion','fecha_entrega','archivo','url','observaciones','name','primer_apellido','id_asignatura','id_grupo','proyectos.id as id')
                    ->join('users','users.id','=','proyectos.id_profesor')
                    ->where('proyectos.id','=',$id)->get();        
            try {
                
                     # code...
                $id_thread = DB::table('messenger_threads')
                        ->select('id')
                        ->where('id_proyecto','=',$id)->get();
                //dd(!empty($id_thread[0]));
                if ( !empty($id_thread[0]) ) {
                    $thread = Thread::findOrFail($id_thread[0]->id);
                } else {
                    $profesores = DB::table('users')
                        ->select('name','primer_apellido','users.id as id')
                        ->join('proyectos','proyectos.id_profesor','=','users.id')
                        ->where('users.id','!=',Auth::id())
                        ->where('proyectos.id','=',$id)->get();
                    $users = DB::table('users')
                                ->select('name','primer_apellido','users.id as id')
                                ->join('proyectos', function ($j) {
                                    $j->whereRaw('FIND_IN_SET(users.id,proyectos.id_alumnos)');
                                })
                                ->where('users.id','!=',Auth::id())
                                ->where('proyectos.id','=',$id)->get();
                    //$users = User::where('id', '!=', Auth::id())->get();
                    return view('admin.messenger.create', compact('users','profesores','id'));
                }            

            //$thread = Thread::where('id_proyecto', '=', $id)->get();
        } catch (ModelNotFoundException $e) {
        //catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'El hilo con ID: ' . $id . ' no fué encontrado.');
            return view('admin.messenger.create', compact('users','profesores','id'));    
            //return redirect()->route('messages');
        }
        // show current user in list if not a current participant
        // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();
        // don't show the current user in list
        $userId = Auth::id();
        //$users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
        $profesores = DB::table('users')
                    ->select('name','primer_apellido','users.id as id')
                    ->join('proyectos','proyectos.id_profesor','=','users.id')
                    ->where('users.id','!=',Auth::id())
                    ->where('proyectos.id','=',$id)->get();
        $users = DB::table('users')
                    ->select('name','primer_apellido','users.id as id')
                    ->join('proyectos', function ($j) {
                        $j->whereRaw('FIND_IN_SET(users.id,proyectos.id_alumnos)');
                    })
                    ->where('users.id','!=',Auth::id())
                    ->where('proyectos.id','=',$id)->get();
        $thread->markAsRead($userId);
        return view('admin.messenger.show', compact('thread', 'users', 'profesores','proyecto'));
    }
    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create($id)
    {
        $profesores = DB::table('users')
                    ->select('name','primer_apellido','users.id as id')
                    ->join('proyectos','proyectos.id_profesor','=','users.id')
                    ->where('users.id','!=',Auth::id())
                    ->where('proyectos.id','=',$id)->get();
        $users = DB::table('users')
                    ->select('name','primer_apellido','users.id as id')
                    ->join('proyectos', function ($j) {
                        $j->whereRaw('FIND_IN_SET(users.id,proyectos.id_alumnos)');
                    })
                    ->where('users.id','!=',Auth::id())
                    ->where('proyectos.id','=',$id)->get();
        //$users = User::where('id', '!=', Auth::id())->get();
        return view('admin.messenger.create', compact('users','profesores','id'));
    }
    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store()
    {
        $input = Input::all();
        $thread = Thread::create([
            'subject' => $input['subject'],
            'id_proyecto' => $input['id_proyecto'],
        ]);
        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => $input['message'],
        ]);
        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'last_read' => new Carbon,
        ]);
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant($input['recipients']);
        }
        $id = $input['id_proyecto'];        
        //$threads = Thread::where('id_proyecto', '=', $id)->get();
        $proyecto = DB::table('proyectos')
                    ->select('nombre_proyecto','descripcion','fecha_entrega','archivo','url','observaciones','name','primer_apellido','id_asignatura','id_grupo','proyectos.id as id')
                    ->join('users','users.id','=','proyectos.id_profesor')
                    ->where('proyectos.id','=',$id)->get();
        $profesores = DB::table('users')
                    ->select('name','primer_apellido','users.id as id')
                    ->join('proyectos','proyectos.id_profesor','=','users.id')
                    ->where('users.id','!=',Auth::id())
                    ->where('proyectos.id','=',$id)->get();
        $users = DB::table('users')
                    ->select('name','primer_apellido','users.id as id')
                    ->join('proyectos', function ($j) {
                        $j->whereRaw('FIND_IN_SET(users.id,proyectos.id_alumnos)');
                    })
                    ->where('users.id','!=',Auth::id())
                    ->where('proyectos.id','=',$id)->get();
        $userId = Auth::id();
        $thread->markAsRead($userId);
        return view('admin.messenger.show', compact('thread','users','id','proyecto','profesores'));
        //return redirect()->route('admin.messages.index', compact('threads','id'));
    }
    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect()->route('messages');
        }
        $thread->activateAllParticipants();
        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => Input::get('message'),
        ]);
        // Add replier as a participant
        $participant = Participant::firstOrCreate([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
        ]);
        $participant->last_read = new Carbon;
        $participant->save();
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant(Input::get('recipients'));
        }
        return redirect()->route('messages.show', $thread->id_proyecto);
    }
}