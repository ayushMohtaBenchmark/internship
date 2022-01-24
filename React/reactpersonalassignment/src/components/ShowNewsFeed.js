import React, { useState, useEffect} from 'react';
import Button from "@material-ui/core/Button";
import Table from "@material-ui/core/Table";
import TableBody from "@material-ui/core/TableBody";
import TableCell from "@material-ui/core/TableCell";
import TableHead from "@material-ui/core/TableHead";
import TableRow from "@material-ui/core/TableRow";
import ButtonGroup from "@material-ui/core/ButtonGroup";
import { Link } from 'react-router-dom';

function ShowNewsFeed() {

    const [newsfeeds, setNewsfeeds] = useState([]);

    const getNewsFeed = async () => {
        try {
            const response = await fetch('http://localhost:8012/yii/restAPIyii/frontend/web/index.php/newsfeeds');
            if (!response.ok) {
            throw new Error('Something went wrong!');
            }
            const data = await response.json();
            console.log(data);
            setNewsfeeds(data);
        }
        catch (error) {
            console.log(error.message);
        }
    };

    useEffect(() => {
        getNewsFeed();
    }, []);

    async function deleteFn(id) {
        if(window.confirm('Are you sure you want to delete ?')) {
          await fetch(`http://localhost:8012/yii/restAPIyii/frontend/web/index.php/newsfeeds/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-type': 'application/json'
            }
          });
        }
        else {
          console.log('Not Deleted Successfully');
        }
        getNewsFeed();
    }

  return (
    <div>
        <Link to='/addnewsfeed'><button className='button button1'>Add News</button></Link>
        <Table aria-label="simple table" style={{border: '1px solid black', marginTop: '20px' }}>
            <TableHead>
            <TableRow style={{background: 'orange'}}>
                <TableCell align="center"><b>ID</b></TableCell>
                <TableCell align="center"><b>Title</b></TableCell>
                <TableCell align="center"><b>Description</b></TableCell>
                <TableCell align="center"><b>Author ID</b></TableCell>
                <TableCell align="center"></TableCell>
            </TableRow>
            </TableHead>
            <TableBody>
            {newsfeeds.map((newsfeed) => (
                <TableRow key={newsfeed.id}>
                <TableCell align="center">{newsfeed.id}</TableCell>
                <TableCell align="center">{newsfeed.title}</TableCell>
                <TableCell align="center">{newsfeed.description}</TableCell>
                <TableCell align="center">{newsfeed.author_id}</TableCell>
                <TableCell align="center">
                    <ButtonGroup
                    color="primary"
                    aria-label="outlined primary button group"
                    >
                    
                    <Button color='primary'>
                        <Link to={`/addnewsfeedupdate/${newsfeed.id}`}>
                        Edit
                        </Link>
                    </Button>
                    
                    
                    <Button color='secondary' onClick={() => deleteFn(newsfeed.id)}>
                        Delete
                    </Button>
                    </ButtonGroup>
                </TableCell>
                </TableRow>
            ))}
            </TableBody>
        </Table>
    </div>
  )
}

export default ShowNewsFeed;
