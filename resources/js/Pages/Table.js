import React, {useEffect, useState} from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';
import Input from "@/Components/Input";
import config from "tailwindcss/defaultConfig";
import Cookies from 'js-cookie'
export default function Table(props) {
    let [page, setPage] = useState(null)
    let [notes, setNotes] = useState([])
    const [pageId,setPageId]=useState(1);
    useEffect(()=> {
        let page_url = '/api/books/'+props.book_id+'/pages?page='+pageId;
        axios.get(page_url)
            .then(res => {
                setPage(res.data);
                console.log("ID:",res.data.data[0].id)
                let note_url='/api/books/'+props.book_id+'/pages/'+res.data.data[0].id+'/notes';
                axios.get(note_url).then(res=>{
                    setNotes(res.data);
                })
            })
    },[pageId])
    // route()
    // console.log(page)
    const nextPage = ()=> setPageId(pageId+1)
    const prevPage = ()=> setPageId(pageId-1)
    const isPrev = () => {return pageId===1}
    const isNext = () => {if (page) return pageId===page.last_page}
    const arr = [1,2,3,4,5]
    // console.log(notes)
    console.log(arr)
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Table" />
            <div className="py-12">
                <div className="mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <table className="table-auto hover:table-fixed">
                            <thead>
                            <tr>
                                <th>Дата записи</th>
                                <th>Наименование документа</th>
                                <th>Номер документа</th>
                                <th>Получатель</th>
                                <th >Прибыло</th>
                                <th >Убыло</th>
                                {/*<th>Всего*/}
                                        {/*<table className="hover:table-fixed"> {arr.map( (item) => <th className="px-6 w-3"> {item}</th> )}*/}
                                        {/*</table>*/}
                                    {/*</th>*/}
                                {/*<th>На складе  <table className="hover:table-fixed"> {arr.map( (item) => <th className="px-6 w-3"> {item}</th> )}*/}
                                {/*</table></th>*/}
                            </tr>
                            </thead>
                            <tbody>
                            {notes.map(note=>(
                                <tr>
                                    <td><Input defaultValue={note.date_of_note}/></td>
                                    <td><Input defaultValue={note.name_document}/></td>
                                    <td><Input defaultValue={note.number_document}/></td>
                                    <td><Input defaultValue={note.provider}/></td>
                                    <td><Input className="px-1 w-12" defaultValue={note.arrived}/></td>
                                    <td><Input className="px-1 w-12" defaultValue={note.subsided}/></td>
                                    {/*<td><table className="hover:table-fixed"><th className="px-2"><Input className="w-5" defaultValue="1" /></th><th className="px-2"><Input className="w-5"  defaultValue="2"/></th><th className="px-3"> 3</th><th className="px-3">4</th> <th className="px-3">5</th>*/}
                                    {/*</tab/le></td>*/}
                                    {/*<td><table className="hover:table-fixed"> {note.categories_all.map( (item) => <td className="px-1 w-3"><Input className="w-12" defaultValue={item}/></td> )}</table></td>*/}
                                    {/*<td><table className="hover:table-fixed"> {note.categories_stock.map( (item) => <td className="px-1 w-3"><Input className="w-12" defaultValue={item}/></td> )}</table></td>*/}
                                </tr>
                            ))}
                            </tbody>
                        </table>
                    </div>
                    <div className="inline-flex">
                        <button onClick={prevPage} disabled={isPrev()} className="disabled:rounded disabled:opacity-50 disabled:cursor-not-allowed bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                            Предыдущая
                        </button>
                        <button onClick={nextPage} disabled={isNext()} className="disabled:rounded disabled:opacity-50 disabled:cursor-not-allowed bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
                            Следующая
                        </button>
                    </div>
                </div>
            </div>
        </Authenticated>
    );
}
