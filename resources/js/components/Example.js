import React, { Component } from 'react';
import ReactDOM from 'react-dom';
/**
 * Importamos componentes
 */
import TransferForm from './TransferForm';
import TransferList from './TransferList';
import url from '../url'

export class Example extends Component{

    // Creamos el constructor
    constructor(props){
        super(props)
        // definimos el state
        this.state = {
            saldo:0.0,
            transfers: [],
            error: null,
            form: {
                concepto: '',
                transaccion: '',
                wallet_id: 1
            }
        }
        this.handleChange = this.handleChange.bind(this)
        this.handleSubmit = this.handleSubmit.bind(this)

    }

    async handleSubmit(e){
        e.preventDefault()
        try {
            let config = {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'

                },
                body: JSON.stringify(this.state.form)
            }
            // hacemos la peticion por get
            let res = await fetch(`${url}/api/transfer`, config)
            // almacenamos la respeusta en data
            let data = await res.json()

            this.setState({
                transfers:this.state.transfers.concat(data),
                saldo: this.state.saldo + (parseInt(data.transaccion))
            })
            
        } catch (error) {
            this.setState({
                error
            })
        }
        console.log('sending...')
    }
    handleChange(e){
        this.setState({
            form: {
                ...this.state.form,
                [e.target.name]: e.target.value
            }
        })
    }

    async componentDidMount(){
        try {
            // hacemos la peticion por get
            let res = await fetch(`${url}/api/wallet`)
            // almacenamos la respeusta en data
            let data = await res.json()
            // actualizamos el state
            this.setState({
                saldo: data.saldo,
                transfers: data.transfers
            })
            console.log(this.state);
        } catch (error) {
            this.setState({
                error
            })

        }
    }

    render(){
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-12-m-t-md">
                        {/* mostramos el valos del state en money */}
                        <p className="title"> $ {this.state.saldo} </p>
                    </div>
                    <div className="col-md-12">
                        <TransferForm
                            form={this.state.form}
                            onChange={this.handleChange}
                            onSubmit={this.handleSubmit}
                        />
                    </div>
                </div>
                <div className="m-t-md">
                    <TransferList 
                    transfers={this.state.transfers}
                    />
                </div>
            </div>
            );
        }
    }
if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}